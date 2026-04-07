<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MarvelModel;

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
        $heroi = MarvelModel::find($heroi);

        return view('alterar_heroi')->with('heroi', $heroi);
    }

    public function altera_heroi(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'codinome' => 'required',
            'idade' => 'required',
            'habilidades' => 'required',
            'equipe' => 'required',
            'primeira_aparicao' => 'required',
            'heroi_id' => 'required',
        ]);

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
        $request->validate([
            'heroi_id' => 'required',
        ]);

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
    }
}
