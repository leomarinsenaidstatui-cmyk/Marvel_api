<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuadrinhosModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
        'nome' => 'required',
        'heroi' => 'required',
        'autor' => 'required',
        'ilustrador' => 'required',
        'editora' => 'required',
        'data_de_lancamento' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'erro' => 's',
                'msg' => 'Dados inválidos',
                'validacao' => $validator->errors(),
            ], 422);
        }

        try {
            $quadrinho = new QuadrinhosModel();
            $usuario = $request->usuario;
            
            if (!$usuario) {
                return response()->json([
                    'erro' => 's',
                    'msg' => 'Usuário não autenticado',
                ], 401);
            }
            
            $quadrinho->user_id = $usuario->id;
            $quadrinho->nome = $request->nome;
            $quadrinho->heroi = $request->heroi;
            $quadrinho->autor = $request->autor;
            $quadrinho->ilustrador = $request->ilustrador;
            $quadrinho->editora = $request->editora;
            $quadrinho->data_de_lancamento = $request->data_de_lancamento;
            $quadrinho->save();

            if (!$quadrinho->id) {
                throw new \Exception('Falha ao salvar quadrinho no banco de dados');
            }

            \Cache::forget('todos_quadrinhos');

            $data = [
                'erro' => 'n',
                'msg' => 'Quadrinho salvo com sucesso',
                'quadrinho' => $quadrinho,
            ];

            return response()->json($data, 200);

        } catch (\Throwable $th) {
            \Log::error('Erro ao salvar quadrinho: ' . $th->getMessage());
            return response()->json([
                'erro' => 's',
                'msg' => 'Erro ao salvar quadrinho: ' . $th->getMessage(),
            ], 500);
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
      $quadrinho = Cache::remember('todos_quadrinhos', 60, function () {
       return QuadrinhosModel:: get()->all();
          
      }); 

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
        $validator = Validator::make($request->all(), [
            'quadrinho_id' => 'required|integer|exists:quadrinhos,id',    
            'nome' => 'required|string|max:255',
            'heroi' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'ilustrador' => 'required|string|max:255',
            'editora' => 'required|string|max:255',
            'data_de_lancamento' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'erro' => 's',
                'msg' => 'Dados inválidos',
                'validacao' => $validator->errors(),
            ], 422);
        }

        try {
            $quadrinho = QuadrinhosModel::find($request->quadrinho_id);
            $usuario = $request->usuario;
            
            if (!$usuario) {
                return response()->json([
                    'erro' => 's',
                    'msg' => 'Usuário não autenticado',
                ], 401);
            }
            
            if (!$quadrinho) {
                return response()->json([
                    'erro' => 's',
                    'msg' => 'Quadrinho não encontrado',
                ], 404);
            }
            
            if ((int) $usuario->id !== (int) $quadrinho->user_id) {
                return response()->json([
                    'erro' => 's',
                    'msg' => 'Você não tem permissão para editar este quadrinho'
                ], 403);
            }
            
            $quadrinho->nome = $request->nome;
            $quadrinho->heroi = $request->heroi;
            $quadrinho->autor = $request->autor;
            $quadrinho->ilustrador = $request->ilustrador;
            $quadrinho->editora = $request->editora;
            $quadrinho->data_de_lancamento = $request->data_de_lancamento;
            $quadrinho->save();

            \Cache::forget('todos_quadrinhos');

            $data = [
                'erro' => 'n',
                'msg' => 'Quadrinho alterado com sucesso',
                'quadrinho' => $quadrinho,
            ];
            
            return response()->json($data, 200);

        } catch (\Throwable $th) {
            \Log::error('Erro ao editar quadrinho: ' . $th->getMessage());
            return response()->json([
                'erro' => 's',
                'msg' => 'Erro ao editar quadrinho: ' . $th->getMessage(),
            ], 500);
        }
    }


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
        $validator = Validator::make($request->all(), [
            'quadrinho_id' => 'required|integer|exists:quadrinhos,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'erro' => 's',
                'msg' => 'Dados inválidos',
                'validacao' => $validator->errors(),
            ], 422);
        }
        
        try {
            $usuario = $request->usuario;
            
            if (!$usuario) {
                return response()->json([
                    'erro' => 's',
                    'msg' => 'Usuário não autenticado',
                ], 401);
            }
            
            $quadrinho = QuadrinhosModel::find($request->quadrinho_id);
            
            if (!$quadrinho) {
                return response()->json([
                    'erro' => 's',
                    'msg' => 'Quadrinho não encontrado',
                ], 404);
            }
            
            if ((int) $usuario->id !== (int) $quadrinho->user_id) {
                return response()->json([
                    'erro' => 's',
                    'msg' => 'Você não tem permissão para deletar este quadrinho',
                ], 403);
            }
            
            $quadrinho->delete();
            \Cache::forget('todos_quadrinhos');
            
            $data = [
                'erro' => 'n',
                'msg' => 'Quadrinho deletado com sucesso'
            ];

            return response()->json($data, 200);
        } catch (\Throwable $th) {
            \Log::error('Erro ao deletar quadrinho: ' . $th->getMessage());
            return response()->json([
                'erro' => 's',
                'msg' => 'Erro ao deletar quadrinho: ' . $th->getMessage(),
            ], 500);
        }
    }

    
        public function lista_quadrinhos() {
       $quadrinhos = QuadrinhosModel::get()->all(); 
        
        return view('quadrinhos')->with('quadrinhos',$quadrinhos);
    }
    
   
}

