<?php

namespace App\Http\Controllers;

use App\Jobs\EnviaEmail;
use App\Jobs\AutenticaJob;
use App\Jobs\RecuperaSenhaJob;
use App\Models\TokenUser;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use App\Models\CodigoEmail;

class UsuarioController extends Controller
{
    public function cadastra_usuario(Request $request)
    {

        try {
            $usuario = new Usuario;
            $usuario->email = $request->email;
            $usuario->telefone = $request->telefone;
            $usuario->nome = $request->nome;
            $usuario->nascimento = $request->nascimento;
            $usuario->genero = $request->genero;
            $usuario->senha = md5($request->senha);
            $usuario->save();

            $data = [
                'erro' => 'n',
                'data' => $usuario,
            ];

            return response()->json($data, 200);

        } catch (\Throwable $th) {

            throw $th;
            $data = [
                'erro' => 's',
                'data' => 'Erro ao Cadastrar Usuario',
            ];
            EnviaEmail::dispatch($usuario);
            return response()->json($data, 200);

        }
    }

public function digitar_codigo(Request $request){
    $request->validate([
        'email' => 'required',
        'codigo' => 'required',
    ]);
}


public function enviar_codigo(Request $request){
    $request->validate([
        'email' => 'required',
        'codigo' => 'required',
    ]);

    $codigo = CodigoEmail::where('email', $request->email)
    ->where('codigo', $request->codigo)
    ->where('valido_ate', '>', Carbon::now())->get()->first();   
    if ($codigo) {
        $usuario = Usuario::where('email', $request->email)->first();
        TokenUser::where('user_id', $usuario->id)->delete();
        $token = new TokenUser;
        $token->user_id = $usuario->id;
        $data = date(format: 'Y-m-d H:i:s');
        $token->token = md5($usuario->id . $usuario->email . $data);
        $agora = Carbon::now();
        $agora->addDays(7);
        $token->valido_ate = $agora;
        $token->save();

        CodigoEmail::where('email', $request->email)->delete();

        $data = [
            'erro' => 'n',
            'msg' => 'Usuario Logado',
            'token' => $token->token,
            'user_id' => $usuario->id,
        ];

        return response()->json($data, 200);
    } else {
        return response()->json([
            'erro' => 's',
            'msg' => 'Codigo Invalido ou Expirado',
        ], 422);
    }
}

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'senha' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'erro' => 's',
                'msg' => 'Dados inválidos',
                'validacao' => $validator->errors(),
            ], 422);
        }

        $usuario = Usuario::where('email', '=', $request->email)
            ->where('senha', '=', md5($request->senha))
            ->first();

        if (!$usuario) {
            return response()->json([
                'erro' => 's',
                'msg' => 'Usuário não encontrado',
            ], 404);
        }

        try {
            AutenticaJob::dispatch($usuario);
        } catch (\Throwable $th) {
            return response()->json([
                'erro' => 's',
                'msg' => 'Falha ao enviar código de autenticação',
                'detalhes' => $th->getMessage(),
            ], 500);
        }

        return response()->json([
            'erro' => 's',
            'msg' => 'autentica_ativa',
        ], 200);
    }

    public function solicitar_codigo_recuperacao(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'erro' => 's',
                'msg' => 'Dados inválidos',
                'validacao' => $validator->errors(),
            ], 422);
        }

        $usuario = Usuario::where('email', $request->email)->first();

        if (!$usuario) {
            return response()->json([
                'erro' => 's',
                'msg' => 'Usuário não encontrado',
            ], 404);
        }

        try {
            RecuperaSenhaJob::dispatch($usuario);
        } catch (\Throwable $th) {
            return response()->json([
                'erro' => 's',
                'msg' => 'Falha ao enviar código de recuperação',
                'detalhes' => $th->getMessage(),
            ], 500);
        }

        return response()->json([
            'erro' => 'n',
            'msg' => 'Código enviado para o seu e-mail',
        ], 200);
    }

    public function confirmar_codigo_recuperacao(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'codigo' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'erro' => 's',
                'msg' => 'Dados inválidos',
                'validacao' => $validator->errors(),
            ], 422);
        }

        $codigoEmail = CodigoEmail::where('email', $request->email)
            ->where('codigo', $request->codigo)
            ->where('valido_ate', '>', Carbon::now())
            ->first();

        if (!$codigoEmail) {
            return response()->json([
                'erro' => 's',
                'msg' => 'Código inválido ou expirado',
            ], 422);
        }

        $usuario = Usuario::where('email', $request->email)->first();
        TokenUser::where('user_id', $usuario->id)->delete();

        $token = new TokenUser;
        $token->user_id = $usuario->id;
        $token->token = md5($usuario->id . $usuario->email . now()->timestamp . random_int(1000, 9999));
        $token->valido_ate = Carbon::now()->addMinutes(30);
        $token->save();

        CodigoEmail::where('email', $request->email)->delete();

        return response()->json([
            'erro' => 'n',
            'msg' => 'Código verificado',
            'token' => $token->token,
        ], 200);
    }

    public function resetar_senha(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'token' => 'required',
            'senha' => 'required|min:6',
            'senha_confirmation' => 'required|same:senha',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'erro' => 's',
                'msg' => 'Dados inválidos',
                'validacao' => $validator->errors(),
            ], 422);
        }

        $token = TokenUser::where('token', $request->token)
            ->where('valido_ate', '>', Carbon::now())
            ->first();

        if (!$token) {
            return response()->json([
                'erro' => 's',
                'msg' => 'Token inválido ou expirado',
            ], 401);
        }

        $usuario = Usuario::find($token->user_id);

        if (!$usuario || $usuario->email !== $request->email) {
            return response()->json([
                'erro' => 's',
                'msg' => 'Usuário não encontrado',
            ], 404);
        }

        $usuario->senha = md5($request->senha);
        $usuario->save();

        CodigoEmail::where('email', $request->email)->delete();
        TokenUser::where('token', $request->token)->delete();

        return response()->json([
            'erro' => 'n',
            'msg' => 'Senha redefinida com sucesso',
        ], 200);
    }

    public function testa_email($id_usuario)
    {
        $usuario = Usuario::find($id_usuario);

        EnviaEmail::dispatch($usuario);

        $data =
        [
            'message' => 'Email enviado para a fila de processamento',
            'usuario' => $usuario,
        ];

        return response()->json($data);
    }

    public function ativar_autenticacao_dupla(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'token' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'erro' => 's',
                'msg' => 'Dados inválidos',
                'validacao' => $validator->errors(),
            ], 422);
        }

        $token = TokenUser::where('token', $request->token)->where('valido_ate', '>', Carbon::now())->first();
        
        if (!$token) {
            return response()->json([
                'erro' => 's',
                'msg' => 'Token inválido ou expirado',
            ], 401);
        }

        $usuario = Usuario::find($token->user_id);
        
        if (!$usuario || $usuario->email !== $request->email) {
            return response()->json([
                'erro' => 's',
                'msg' => 'Usuário não encontrado',
            ], 404);
        }

        // Gerar código de verificação
        $codigo = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $codigoEmail = CodigoEmail::where('email', $usuario->email)->first();
        
        if (!$codigoEmail) {
            $codigoEmail = new CodigoEmail();
            $codigoEmail->email = $usuario->email;
        }
        
        $codigoEmail->codigo = $codigo;
        $codigoEmail->valido_ate = Carbon::now()->addMinutes(10);
        $codigoEmail->save();

        // Disparar job para enviar email
        AutenticaJob::dispatch($usuario);

        return response()->json([
            'erro' => 'n',
            'msg' => 'Código de verificação enviado para seu email',
        ], 200);
    }

    public function desativar_autenticacao_dupla(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'token' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'erro' => 's',
                'msg' => 'Dados inválidos',
                'validacao' => $validator->errors(),
            ], 422);
        }

        $token = TokenUser::where('token', $request->token)->where('valido_ate', '>', Carbon::now())->first();
        
        if (!$token) {
            return response()->json([
                'erro' => 's',
                'msg' => 'Token inválido ou expirado',
            ], 401);
        }

        $usuario = Usuario::find($token->user_id);
        
        if (!$usuario || $usuario->email !== $request->email) {
            return response()->json([
                'erro' => 's',
                'msg' => 'Usuário não encontrado',
            ], 404);
        }

        $usuario->dupla_autentica = '0';
        $usuario->save();

        return response()->json([
            'erro' => 'n',
            'msg' => 'Autenticação dupla desativada com sucesso',
            'dupla_autentica' => $usuario->dupla_autentica,
        ], 200);
    }

    public function status_autenticacao_dupla(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'erro' => 's',
                'msg' => 'Token é obrigatório',
            ], 422);
        }

        $token = TokenUser::where('token', $request->token)->where('valido_ate', '>', Carbon::now())->first();
        
        if (!$token) {
            return response()->json([
                'erro' => 's',
                'msg' => 'Token inválido ou expirado',
            ], 401);
        }

        $usuario = Usuario::find($token->user_id);
        
        if (!$usuario) {
            return response()->json([
                'erro' => 's',
                'msg' => 'Usuário não encontrado',
            ], 404);
        }

        return response()->json([
            'erro' => 'n',
            'dupla_autentica' => $usuario->dupla_autentica === '1' ? true : false,
            'usuario' => [
                'id' => $usuario->id,
                'nome' => $usuario->nome,
                'email' => $usuario->email,
            ],
        ], 200);
    }

    public function confirmar_codigo_dupla_autentica(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'codigo' => 'required',
            'token' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'erro' => 's',
                'msg' => 'Dados inválidos',
                'validacao' => $validator->errors(),
            ], 422);
        }

        $token = TokenUser::where('token', $request->token)->where('valido_ate', '>', Carbon::now())->first();
        
        if (!$token) {
            return response()->json([
                'erro' => 's',
                'msg' => 'Token inválido ou expirado',
            ], 401);
        }

        $usuario = Usuario::find($token->user_id);
        
        if (!$usuario || $usuario->email !== $request->email) {
            return response()->json([
                'erro' => 's',
                'msg' => 'Usuário não encontrado',
            ], 404);
        }

        $codigo = CodigoEmail::where('email', $request->email)
            ->where('codigo', $request->codigo)
            ->where('valido_ate', '>', Carbon::now())
            ->first();

        if (!$codigo) {
            return response()->json([
                'erro' => 's',
                'msg' => 'Código inválido ou expirado',
            ], 422);
        }

        $usuario->dupla_autentica = '1';
        $usuario->save();
        
        CodigoEmail::where('email', $request->email)->delete();

        return response()->json([
            'erro' => 'n',
            'msg' => 'Autenticação dupla ativada com sucesso!',
            'dupla_autentica' => true,
        ], 200);
    }
}