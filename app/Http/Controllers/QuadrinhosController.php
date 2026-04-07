<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuadrinhosModel;

class QuadrinhosController extends Controller
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

    public function salva_quadrinho(Request $request) {
        $request->validate([
        'nome' => 'required',
        'heroi' => 'required',
        'autor' => 'required',
        'ilustrador' => 'required',
        'editora' => 'required',
        'data_de_lancamento' => 'required'
        ]);

        try {
            $quadrinho = new QuadrinhosModel ();
            $usuario = $request->usuario;
            $quadrinho->user_id = $usuario->id;
            $quadrinho->nome = $request->nome;
            $quadrinho->heroi = $request->heroi;
            $quadrinho->autor = $request->autor;
            $quadrinho->ilustrador = $request->ilustrador;
            $quadrinho->editora = $request->editora;
            $quadrinho->data_de_lancamento = $request->data_de_lancamento;
            $quadrinho->save();


            $data = [
                'msg' => 'Quadrinho Salvo',
                'quadrinho' => $quadrinho,
            ];

            return response()->json($data,200);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function exibe_quadrinho($id)
    {
        $quadrinho = QuadrinhoModel:: find($id);

        $data = [
            'erro' => 'n',
            'heroi' => $quadrinho,
        ];

        return response()->json($data, 200);
    }
    
    public function todos_quadrinhos(Request $request) {
      $quadrinho = QuadrinhosModel:: get()->all();

      $data = [
        'erro' => 'n',
        'quadrinho' => $quadrinho,




      ];

      return response()->json($data, 200);

    }


    public function atualiza_quadrinho(Request $request, $id)
{
    $request->validate([
        'nome' => 'required',
        'heroi' => 'required',
        'autor' => 'required',
        'ilustrador' => 'required',
        'editora' => 'required',
        'data_de_lancamento' => 'required'
    ]);

    try {
         $quadrinho = new QuadrinhosModel ();
            $quadrinho->nome = $request->nome;
            $quadrinho->heroi = $request->heroi;
            $quadrinho->autor = $request->autor;
            $quadrinho->ilustrador = $request->ilustrador;
            $quadrinho->editora = $request->editora;
            $quadrinho->data_de_lancamento = $request->data_de_lancamento;
            $quadrinho->save();

        $data = [
            'msg' => 'Quadrinho Atualizado',
            'quadrinho' => $quadrinho,
        ];

        return response()->json($data,200);

    } catch (\Throwable $th) {
        throw $th;
    }
}



public function visualiza_quadrinho($quadrinho){
    $quadrinho = QuadrinhosModel::find($quadrinho);

    return view('edita_quadrinho')->with('quadrinho',$quadrinho);
    
}












public function mostra_quadrinho($quadrinho){
    $quadrinho = QuadrinhosModel::find($quadrinho);

    return view('edita_quadrinho')->with('quadrinho',$quadrinho);
}


public function edita_quadrinho(Request $request){

 $request->validate([
        'quadrinho_id' => 'required',    
        'nome' => 'required',
        'heroi' => 'required',
        'autor' => 'required',
        'ilustrador' => 'required',
        'editora' => 'required',
        'data_de_lancamento' => 'required'
    ]);

    try {
         $quadrinho = QuadrinhosModel::find ($request->quadrinho_id); 
         $usuario = $request->usuario;
         if($usuario->id == $quadrinho->user_id){
            $quadrinho->nome = $request->nome;
            $quadrinho->heroi = $request->heroi;
            $quadrinho->autor = $request->autor;
            $quadrinho->ilustrador = $request->ilustrador;
            $quadrinho->editora = $request->editora;
            $quadrinho->data_de_lancamento = $request->data_de_lancamento;
            $quadrinho->save();


            $data = [
                'erro' => 'n',
                'msg' => 'Quadrinho Alterado',
                'quadrinho' => $quadrinho,
            ];
         }else{

             $data=[
                "erro" => 's',
                "msg" => 'Usuario não pode alterar oque não cadastrou'
            ];
            return response()->json($data,200);

            }

            return response()->json($data,200);

        } catch (\Throwable $th) {
            throw $th;
        }
    
}


  public function deletar_quadrinho ($id)
    {
        $quadrinho = QuadrinhosModel::find($id);

        return view('deletar_quadrinho')->with('quadrinho', $quadrinho);


    }


    public function deleta_quadrinho(Request $request){
        $request->validate([
        'quadrinho_id' => 'required',
        ]);
        
    try{
         $usuario = $request->usuario;
       $quadrinho = QuadrinhosModel::find($request->quadrinho_id);
       if($usuario->id == $quadrinho->user_id){
         $quadrinho->delete();
        $data = [
            'erro' => 'n',
            'msg' => 'quadrinho deletado'
        ];

       }else{
         $data = [
            'erro' => 's',
            'msg' => 'Este Quadrinho não foi cadastrado por este usuario'
        ];
       }
      
        return response()->json($data,200);
            } catch (\Throwable $th) {
            throw $th;
        }
    }

    
        public function lista_quadrinhos() {
       $quadrinhos = QuadrinhosModel::get()->all(); 
        
        return view('quadrinhos')->with('quadrinhos',$quadrinhos);
    }
    
   
}


