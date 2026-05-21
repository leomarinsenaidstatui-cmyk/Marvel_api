<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Usuario;
use App\Models\CodigoEmail;
use Illuminate\Support\Facades\Mail;
use App\Mail\AutenticaDuplaMail;

class AutenticaJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public Usuario $usuario;

    /**
     * Create a new job instance.
     */
    public function __construct(Usuario $usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $codigo = rand(100000, 999999);
        $email = $this->usuario->email;
        $valido_ate = now()->addMinutes(10);


        CodigoEmail::create([
            'email' => $this->usuario->email,
            'codigo' => $codigo,
            'valido_ate' => $valido_ate,
        ]);
        
        

       Mail::to($email)->send(new AutenticaDuplaMail($codigo));
    
    }
}
