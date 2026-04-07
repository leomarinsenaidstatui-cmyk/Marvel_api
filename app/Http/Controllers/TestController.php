<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MarvelModel;

class TestController extends Controller
{
    public function envia_teste(Request $request) {
       
    $data = [
            "Corinthians" => "2x0",
            'Numero' => $request->numero
        ];
        
        return response()->json($data,200);
    }

    public function soma(Request $request) {
       
    $data = [
            "Corinthians" => "2x0",
            'soma' => $request->numero + $request->numero_dois,
        ];
        
        return response()->json($data,200);
        
    }

    public function salva_heroi(Request $request) {
        $request->validate([
            'nome' => 'required',
            'codinome' => 'required',
            'idade' => 'required',
            'habilidades' => 'required',
            'equipe' => 'required',
            'primeira_aparicao' => 'required'
        ]);

        try {
            $marvel = new MarvelModel();
            $usuario = $request->usuario;
            
            // CORREÇÃO 1: Adicionado user_id
            $marvel->user_id = $usuario->id;
            
            $marvel->nome = $request->nome;
            $marvel->codinome = $request->codinome;
            $marvel->idade = $request->idade;
            $marvel->habilidades = $request->habilidades;
            $marvel->equipe = $request->equipe;
            $marvel->primeira_aparicao = $request->primeira_aparicao;
            $marvel->save();

            $data = [
                'erro' => 'n',  // CORREÇÃO 2: Adicionado campo erro para consistência
                'msg' => 'Heroi Salvo',
                'heroi' => $marvel,
            ];

            return response()->json($data,200);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function exibe_heroi($id)
    {
        $marvel = MarvelModel::find($id);

        $data = [
            'erro' => 'n',
            'heroi' => $marvel,
        ];

        return response()->json($data, 200);
    }
    
    public function todos_herois(Request $request) {
        $marvel = MarvelModel::get()->all();

        $data = [
            'erro' => 'n',
            'herois' => $marvel,
        ];

        return response()->json($data, 200);
    }

    // CORREÇÃO 3: Método atualiza_heroi corrigido (não cria novo registro)
    public function atualiza_heroi(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'codinome' => 'required',
            'idade' => 'required',
            'habilidades' => 'required',
            'equipe' => 'required',
            'primeira_aparicao' => 'required'
        ]);

        try {
            // CORREÇÃO: Buscar o herói existente em vez de criar novo
            $marvel = MarvelModel::find($id);
            
            if (!$marvel) {
                return response()->json([
                    'erro' => 's',
                    'msg' => 'Herói não encontrado'
                ], 404);
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

            return response()->json($data,200);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function visualiza_heroi($heroi){
        $heroi = MarvelModel::find($heroi);

        return view('visualiza_heroi')->with('heroi', $heroi);
    }

    public function mostra_heroi($heroi){
        $heroi = MarvelModel::find($heroi);

        return view('alterar_heroi')->with('heroi', $heroi);
    }

    // Método altera_heroi já está correto, mantido igual
    public function altera_heroi(Request $request){
        $request->validate([
            'nome' => 'required',
            'codinome' => 'required',
            'idade' => 'required',
            'habilidades' => 'required',
            'equipe' => 'required',
            'primeira_aparicao' => 'required',
            'heroi_id' => 'required'
        ]);

        try {
            $heroi = MarvelModel::find($request->heroi_id); 
            $usuario = $request->usuario;
            
            if($usuario->id == $heroi->user_id){
                $heroi->nome = $request->nome;
                $heroi->codinome = $request->codinome;
                $heroi->idade = $request->idade;
                $heroi->habilidades = $request->habilidades;
                $heroi->equipe = $request->equipe;
                $heroi->primeira_aparicao = $request->primeira_aparicao;
                $heroi->save();

                $data = [
                    'erro' => 'n',
                    'msg' => 'heroi Alterado',
                    'heroi' => $heroi,
                ];
            } else {
                $data = [
                    "erro" => 's',
                    "msg" => 'Usuario não pode alterar o que não cadastrou'
                ];
                return response()->json($data,200);
            }

            return response()->json($data,200);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function deletar_heroi($id) {
        $heroi = MarvelModel::find($id);

        return view('deletar_heroi')->with('heroi', $heroi);
    }

    // CORREÇÃO 4: Método deleta_heroi com verificação de dono
    public function deleta_heroi(Request $request){
        $request->validate([
            'heroi_id' => 'required',
        ]);
        
        try {
            $usuario = $request->usuario;
            $heroi = MarvelModel::find($request->heroi_id);
            
            // Verifica se o herói existe
            if (!$heroi) {
                return response()->json([
                    'erro' => 's',
                    'msg' => 'Herói não encontrado'
                ], 404);
            }
            
            // CORREÇÃO: Verifica se o usuário é o dono
            if($usuario->id == $heroi->user_id){
                $heroi->delete();
                $data = [
                    'erro' => 'n',
                    'msg' => 'heroi deletado'
                ];
            } else {
                $data = [
                    'erro' => 's',
                    'msg' => 'Este herói não foi cadastrado por este usuário'
                ];
            }
            
            return response()->json($data,200);
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function lista_herois() {
        $herois = MarvelModel::get()->all();
        
        return view('heroi')->with('herois', $herois);
    }
}