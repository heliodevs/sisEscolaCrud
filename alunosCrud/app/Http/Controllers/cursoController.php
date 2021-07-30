<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Aluno;
use App\Models\User;
use Illuminate\Http\UploadedFile;

class cursoController extends Controller
{
    public function cadastrarCurso(){
        return view('cadCurso');
    }
    public function salvarCurso(Request $request){

        $curso = Curso::where('cdCurso',($request->cdCurso))->first();


        if($curso == null){
        $curso = new Curso();

        $curso->cdCurso = $request->cdCurso;
        $curso->nmCurso = $request->nmCurso;

        $curso->save();
        return view('cadCurso', ['msg'=>'Curso cadastrado com Sucesso']);

        }else{
            return redirect()->back()->withInput()->withErrors(['Código do Curso já existe!']);
        }


    }
    public function listaCurso(){
        $cursos = Curso::get();

        return view('listCurso', ['cursos'=>$cursos]);
    }
    public function delCurso(Request $request){
        $curso = Curso::find($request->cursoid);

        $curso->delete();

        return redirect('listCurso');

    }

    public function editCurso(Request $request){
        $curso = Curso::find($request->cursoid);

        return view('editCurso', ['curso'=>$curso]);

    }
    public function editCursoSalv(Request $request){
        $curso = Curso::find($request->id);


        $curso->cdCurso = $request->cdCurso;
        $curso->nmCurso = $request->nmCurso;

        $curso->save();

        $cursos = Curso::get();

        return view('listCurso', ['msg'=>'Editado com sucesso!', 'cursos'=>$cursos]);

    }

    //cad aluno

    public function cadAluno(){
        $cursos = Curso::get();
        return view('cadAluno', ['cursos'=>$cursos]) ;
    }

    public function salvarAluno(Request $request){

        $aluno = Aluno::where('matricula',($request->matricula))->first();


 if($aluno == null){
        $cursos = Curso::get();
        $upload = $request->image->store('alunos');

        $aluno = new Aluno();

        $aluno->aluno = $request->aluno;
        $aluno->matricula = $request->matricula;
        $aluno->situacaoalu = $request->situacaoalu;
        $aluno->cep = $request->cep;
        $aluno->rua = $request->rua;
        $aluno->numEnd = $request->numEnd;
        $aluno->bairro = $request->bairro;
        $aluno->cidade = $request->cidade;
        $aluno->estado = $request->estado;
        $aluno->curso = $request->curso;
        $aluno->turma = $request->turma;
        $aluno->dtMatricula = $request->dtMatricula;
        $aluno->image = $upload;

        //return $request;

        $aluno->save();

        return view('cadAluno', ['msg'=>'Aluno cadastrado com Sucesso', 'cursos'=>$cursos]);
 }else{
    return redirect()->back()->withInput()->withErrors(['Matricula já existe!']);
}

    }

    public function listAluno(){
        $alunos = Aluno::get();

        return view('listAluno', ['alunos'=>$alunos]);
    }

    public function delAluno(Request $request){
        $aluno = Aluno::find($request->alunoid);

        $aluno->delete();

        return redirect('listAluno');

    }

    public function editAluno(Request $request){
        $cursos = Curso::get();

        $aluno = Aluno::find($request->alunoid);

        return view('editAluno', ['aluno'=>$aluno, 'cursos'=>$cursos]);
    }
    public function editAlunoSalv(Request $request){
        $aluno = Aluno::find($request->id);



        $aluno->aluno = $request->aluno;
        $aluno->matricula = $request->matricula;
        $aluno->situacaoalu = $request->situacaoalu;
        $aluno->cep = $request->cep;
        $aluno->rua = $request->rua;
        $aluno->numEnd = $request->numEnd;
        $aluno->bairro = $request->bairro;
        $aluno->cidade = $request->cidade;
        $aluno->estado = $request->estado;
        $aluno->curso = $request->curso;
        $aluno->turma = $request->turma;
        $aluno->dtMatricula = $request->dtMatricula;
        if($request->image != null){
            $upload = $request->image->store('alunos');
            $aluno->image = $upload;
        }

        $aluno->save();

        $alunos = Aluno::get();

        return view('listAluno', ['msg'=>'Editado com sucesso!', 'alunos'=>$alunos]);

    }

    public function buscaAluno(Request $request)
    {


     $aluno = Aluno::where('matricula','=',($request->pesquisa))->get();


        return view('listAluno',['alunos'=>$aluno]);
    }

    public function impXml(){

        return view("impXml");
    }
    public function saveImport(Request $request){
        libxml_use_internal_errors(true);
        $xml = simplexml_load_file($request->file('xml'));

        if(!isset($request->xml)){
            return redirect()->back()->withInput()->withErrors(['Selecione um arquivo xml']);
        }
        if($xml != null)
        {
            foreach($xml->curso as $curso){
            $newCurso = new Curso();
            $newCurso->nmCurso = $curso->nome;
            $newCurso->cdCurso = $curso->codigo;
            $newCurso->save();
            }
            return redirect()->route('listCurso');
        }else{
            return redirect()->back()->withInput()->withErrors(['Arquivo inválido']);
        }
    }
}
