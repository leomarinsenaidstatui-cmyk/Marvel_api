<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('quadrinhos', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->text("nome");
             $table->text("heroi");
            $table->text("autor");
            $table->text("ilustrador");
            $table->text("editora");
            $table->date("data_de_lancamento");
            
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quadrinhos');
    }
};
