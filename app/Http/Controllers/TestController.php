<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\MarvelModel;
use App\Models\Usuario;

class TestController extends Controller
{
    private function resolveUsuario(Request $request)
    {
        return $request->usuario ?? $request->user();
    }

    public function envia_teste(Request $request)
    {
        $data = [
            'Corinthians' => '2x0',
            'Numero' => $request->numero,
        ];

        return response()->json($data, 200);
    }

    public function soma(Request $request)
    {
        $data = [
            'Corinthians' => '2x0',
            'soma' => $request->numero + $request->numero_dois,
        ];

        return response()->json($data, 200);
    }

    public function salva_heroi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'codinome' => 'required',
            'idade' => 'required',
            'habilidades' => 'required',
            'equipe' => 'required',
            'primeira_aparicao' => 'required',
            'user_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'erro' => 's',
                'msg' => 'Dados invalidos',
                'validacao' => $validator->errors(),
            ], 422);
        }

        try {
            $usuario = $this->resolveUsuario($request);

            if (!$usuario) {
                $usuario = Usuario::find($request->user_id);
            }

            if (!$usuario || (int) $usuario->id !== (int) $request->user_id) {
                return response()->json([
                    'erro' => 's',
                    'msg' => 'user_id invalido para cadastrar o heroi',
                ], 422);
            }

            $marvel = new MarvelModel();
            $marvel->user_id = $usuario->id;
            $marvel->nome = $request->nome;
            $marvel->codinome = $request->codinome;
            $marvel->idade = $request->idade;
            $marvel->habilidades = $request->habilidades;
            $marvel->equipe = $request->equipe;
            $marvel->primeira_aparicao = $request->primeira_aparicao;
            $marvel->save();

            $data = [
                'erro' => 'n',
                'msg' => 'Heroi Salvo',
                'heroi' => $marvel,
            ];

            return response()->json($data, 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function exibe_heroi($id)
    {
        $marvel = MarvelModel::find($id);

        if (!$marvel) {
            return response()->json([
                'erro' => 's',
                'msg' => 'Heroi nao encontrado',
            ], 404);
        }

        $data = [
            'erro' => 'n',
            'heroi' => $marvel,
        ];

        return response()->json($data, 200);
    }

    public function todos_herois(Request $request)
    {
        $marvel = MarvelModel::all();

        $data = [
            'erro' => 'n',
            'herois' => $marvel,
        ];

        return response()->json($data, 200);
    }

    public function lista_herois_api()
    {
        $herois = MarvelModel::all();

        return response()->json([
            'erro' => 'n',
            'herois' => $herois,
        ], 200);
    }

    public function lista_herois_web()
    {
        $herois = MarvelModel::all();
        return view('heroi')->with('herois', $herois);
    }

    public function atualiza_heroi(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'codinome' => 'required',
            'idade' => 'required',
            'habilidades' => 'required',
            'equipe' => 'required',
            'primeira_aparicao' => 'required',
        ]);

        try {
            $usuario = $this->resolveUsuario($request);
            if (!$usuario) {
                return response()->json([
                    'erro' => 's',
                    'msg' => 'Usuario nao autenticado',
                ], 401);
            }

            $marvel = MarvelModel::find($id);
            if (!$marvel) {
                return response()->json([
                    'erro' => 's',
                    'msg' => 'Heroi nao encontrado',
                ], 404);
            }

            if ($usuario->id != $marvel->user_id) {
                return response()->json([
                    'erro' => 's',
                    'msg' => 'Usuario nao pode alterar o que nao cadastrou',
                ], 403);
            }

            $marvel->nome = $request->nome;
            $marvel->codinome = $request->codinome;
            $marvel->idade = $request->idade;
            $marvel->habilidades = $request->habilidades;
            $marvel->equipe = $request->equipe;
            $marvel->primeira_aparicao = $request->primeira_aparicao;
            $marvel->save();

            $data = [
                'erro' => 'n',
                'msg' => 'Heroi Atualizado',
                'heroi' => $marvel,
            ];

            return response()->json($data, 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function visualiza_heroi($heroi)
    {
        $heroi = MarvelModel::find($heroi);

        return view('visualiza_heroi')->with('heroi', $heroi);
    }

    public function mostra_heroi($heroi)
    {
        $heroi = Cache::rememberForever ('mostra_heroi_' . $heroi,  function () use ($heroi) {
            return MarvelModel::find($heroi);
        });

        return view('altera_heroi')->with('heroi', $heroi);
    }

    public function altera_heroi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'codinome' => 'required',
            'idade' => 'required',
            'habilidades' => 'required',
            'equipe' => 'required',
            'primeira_aparicao' => 'required',
            'heroi_id' => 'required',
        ]);
        cache::forget('mostra_heroi_' . $request->heroi_id);

        if ($validator->fails()) {
            return response()->json([
                'erro' => 's',
                'msg' => 'Dados invalidos',
                'validacao' => $validator->errors(),
            ], 422);
        }

        try {
            $usuario = $this->resolveUsuario($request);
            if (!$usuario) {
                return response()->json([
                    'erro' => 's',
                    'msg' => 'Usuario nao autenticado',
                ], 401);
            }

            $heroi = MarvelModel::find($request->heroi_id);
            if (!$heroi) {
                return response()->json([
                    'erro' => 's',
                    'msg' => 'Heroi nao encontrado',
                ], 404);
            }

            if ($usuario->id == $heroi->user_id) {
                $heroi->nome = $request->nome;
                $heroi->codinome = $request->codinome;
                $heroi->idade = $request->idade;
                $heroi->habilidades = $request->habilidades;
                $heroi->equipe = $request->equipe;
                $heroi->primeira_aparicao = $request->primeira_aparicao;
                $heroi->save();

                $data = [
                    'erro' => 'n',
                    'msg' => 'Heroi Alterado',
                    'heroi' => $heroi,
                ];

                return response()->json($data, 200);
            }

            return response()->json([
                'erro' => 's',
                'msg' => 'Usuario nao pode alterar o que nao cadastrou',
            ], 403);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function deletar_heroi($id)
    {
        $heroi = MarvelModel::find($id);

        return view('deletar_heroi')->with('heroi', $heroi);
    }

    public function deleta_heroi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'heroi_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'erro' => 's',
                'msg' => 'Dados invalidos',
                'validacao' => $validator->errors(),
            ], 422);
        }

        try {
            $usuario = $this->resolveUsuario($request);
            if (!$usuario) {
                return response()->json([
                    'erro' => 's',
                    'msg' => 'Usuario nao autenticado',
                ], 401);
            }

            $heroi = MarvelModel::find($request->heroi_id);
            if (!$heroi) {
                return response()->json([
                    'erro' => 's',
                    'msg' => 'Heroi nao encontrado',
                ], 404);
            }

            if ($usuario->id == $heroi->user_id) {
                $heroi->delete();

                return response()->json([
                    'erro' => 'n',
                    'msg' => 'Heroi deletado',
                ], 200);
            }

            return response()->json([
                'erro' => 's',
                'msg' => 'Este heroi nao foi cadastrado por este usuario',
            ], 403);
        } catch (\Throwable $th) {
            throw $th;
        }
        cache::forget('mostra_heroi_' . $request->heroi_id);
    }

    public function reatribui_dono_heroi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'heroi_id' => 'required|integer',
            'novo_user_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'erro' => 's',
                'msg' => 'Dados invalidos',
                'validacao' => $validator->errors(),
            ], 422);
        }

        try {
            $usuario = $this->resolveUsuario($request);
            if (!$usuario) {
                return response()->json([
                    'erro' => 's',
                    'msg' => 'Usuario nao autenticado',
                ], 401);
            }

            $heroi = MarvelModel::find($request->heroi_id);
            if (!$heroi) {
                return response()->json([
                    'erro' => 's',
                    'msg' => 'Heroi nao encontrado',
                ], 404);
            }

            if ((int) $usuario->id !== (int) $heroi->user_id) {
                return response()->json([
                    'erro' => 's',
                    'msg' => 'Somente o dono atual pode reatribuir este heroi',
                ], 403);
            }

            $novoUsuario = Usuario::find($request->novo_user_id);
            if (!$novoUsuario) {
                return response()->json([
                    'erro' => 's',
                    'msg' => 'Novo usuario nao encontrado',
                ], 404);
            }

            if ((int) $heroi->user_id === (int) $novoUsuario->id) {
                return response()->json([
                    'erro' => 's',
                    'msg' => 'Este heroi ja pertence a este usuario',
                ], 422);
            }

            $heroi->user_id = $novoUsuario->id;
            $heroi->save();

            return response()->json([
                'erro' => 'n',
                'msg' => 'Dono do heroi reatribuido com sucesso',
                'heroi' => $heroi,
            ], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
