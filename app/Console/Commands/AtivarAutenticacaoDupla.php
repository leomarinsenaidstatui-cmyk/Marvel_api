<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Usuario;

class AtivarAutenticacaoDupla extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'autenticacao:ativar {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ativa a autenticação dupla para um usuário específico';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        
        $usuario = Usuario::where('email', $email)->first();
        
        if (!$usuario) {
            $this->error("❌ Usuário com email '{$email}' não encontrado!");
            return 1;
        }

        $usuario->dupla_autentica = '1';
        $usuario->save();

        $this->info("✅ Autenticação dupla ativada para: {$usuario->nome} ({$usuario->email})");
        return 0;
    }
}
