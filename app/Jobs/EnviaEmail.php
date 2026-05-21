<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\NovoMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Usuario;


class EnviaEmail implements ShouldQueue
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
       Mail::to($this->usuario->email)->send(new NovoMail($this->usuario)); 
    }
}
