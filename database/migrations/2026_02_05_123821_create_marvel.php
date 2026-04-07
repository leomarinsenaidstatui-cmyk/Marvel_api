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
        Schema::create('marvel', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->text("nome");
            $table->text("codinome");
            $table->integer("idade");
            $table->text("habilidades");
            $table->text("equipe");
            $table->integer("primeira_aparicao");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marvel');
    }
};
