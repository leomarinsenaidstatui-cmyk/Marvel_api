<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MarvelModel;

class TestController extends Controller
{
    public function envia_teste(Request $request) {
       
    $data = [
            "Corinthians" => "2x0",
            'Numero' => $request ->numero
        ];
        
        return response()->json($data,200);
    }

     public function soma(Request $request) {
       
    $data = [
            "Corinthians" => "2x0",
            'soma' => $request ->numero + $request ->numero_dois,
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
            $marvel = new MarvelModel ();
            $marvel->nome = $request->nome;
            $marvel->codinome = $request->codinome;
            $marvel->idade = $request->idade;
            $marvel->habilidades = $request->habilidades;
            $marvel->equipe = $request->equipe;
            $marvel->primeira_aparicao = $request->primeira_aparicao;
            $marvel->save();


            $data = [
                'msg' => 'Heroi Salvo',
                'marvel' => $marvel,
            ];

            return response()->json($data,200);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function exibe_heroi($id)
    {
        $marvel = MarvelModel:: find($id);

        $data = [
            'erro' => 'n',
            'heroi' => $marvel,
        ];

        return response()->json($data, 200);
    }
    
    public function todos_herois(Request $request) {
      $marvel = MarvelModel:: get()->all();

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
        'primeira_aparicao' => 'required'
    ]);

    try {
        $marvel = MarvelModel::find($id);
        
        $marvel->nome = $request->nome;
        $marvel->codinome = $request->codinome;
        $marvel->idade = $request->idade;
        $marvel->habilidades = $request->habilidades;
        $marvel->equipe = $request->equipe;
        $marvel->primeira_aparicao = $request->primeira_aparicao;
        $marvel->save();

        $data = [
            'msg' => 'Heroi Atualizado',
            'marvel' => $marvel,
        ];

        return response()->json($data,200);

    } catch (\Throwable $th) {
        throw $th;
    }
}


    public function deleta_heroi($id)
{
    try {
        $marvel = MarvelModel::find($id);
        $marvel->delete();

        $data = [
            'msg' => 'Heroi Deletado',
            'id' => $id,
        ];

        return response()->json($data,200);

    } catch (\Throwable $th) {
        throw $th;
    }
}



}
