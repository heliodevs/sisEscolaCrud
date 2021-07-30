<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string('aluno');
            $table->integer('matricula')->uniqid();
            $table->string('curso');
            $table->string('turma');
            $table->date('dtMatricula');
            $table->string('cep');
            $table->string('estado');
            $table->string('image');
            $table->string('cidade');
            $table->string('bairro');
            $table->string('rua');
            $table->integer('numEnd');
            $table->string('situacaoalu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alunos');
    }
}
