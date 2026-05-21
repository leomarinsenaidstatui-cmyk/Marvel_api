<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Usuario;
use App\Models\CodigoEmail;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecuperaSenhaMail;

class RecuperaSenhaJob implements ShouldQueue
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
        $codigo = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        CodigoEmail::updateOrCreate(
            ['email' => $this->usuario->email],
            ['codigo' => $codigo, 'valido_ate' => now()->addMinutes(10)]
        );

        Mail::to($this->usuario->email)->send(new RecuperaSenhaMail($codigo));
    }
}
