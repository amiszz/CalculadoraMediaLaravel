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
    Schema::create('notas', function (Blueprint $table) {
        $table->id();

        $table->foreignId('aluno_id')
              ->constrained()
              ->onDelete('cascade');

        $table->decimal('nota1', 4, 1);
        $table->decimal('nota2', 4, 1);
        $table->decimal('nota3', 4, 1);
        $table->decimal('nota4', 4, 1);

        $table->decimal('media', 4, 1);

        $table->string('conceito');

        $table->string('mensagem');

        $table->decimal('recuperacao', 4, 1)
              ->nullable();

        $table->string('resultado_final')
              ->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};
