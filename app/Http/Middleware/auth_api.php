<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\TokenUser;
use Carbon\Carbon;

use Symfony\Component\HttpFoundation\Response;

class auth_api
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->has('token')){
            $hoje = Carbon::now();
            $token = TokenUser::where('token',$request->token)->where('valido_ate','>=',$hoje)->get()->first();
            if($token){
                $usuario = Usuario::find($token->user_id);
                $request->usuario = $usuario;
                $request->token = $token;
                return $next($request);
            }else{

             $data=[
                "erro" => 's',
                "msg" => 'Token Invalido!'
            ];
            return response()->json($data,200);

            }
        }else{
            $data=[
                "erro" => 's',
                "msg" => 'Voce não enviou o Token!'
            ];
            return response()->json($data,200);
        }

        
    }
}
