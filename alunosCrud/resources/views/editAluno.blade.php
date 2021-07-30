<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Aluno') }}


        </h2>
    </x-slot>
        <!-- Última versão CSS compilada e minificada -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Tema opcional -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Última versão JavaScript compilada e minificada -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="/editAlunoSalv" method="post" enctype="multipart/form-data">

                    @csrf
                        <input type="hidden" name="id" value="{{$aluno->id}}">

                        Nome do Aluno: <input name="aluno" value="{{$aluno->aluno}}" required class="form-control form-control-lg require" type="text" placeholder="">
                        Matricula: <input name="matricula" value="{{$aluno->matricula}}" required class="form-control form-control-lg require" type="number" placeholder="000000">
                        Situação do Aluno: <select class="form-select" value="{{$aluno->stAluno}}" required style="margin-top: 1%" name="situacaoalu" aria-label="Default select example">
                            <option value="ativo">Ativo</option>
                            <option value="inativo">Inativo</option>
                          </select></br>
                          CEP: <input name="cep" id="cep" value="{{$aluno->cep}}" required onblur="buscaEndeco()" class="form-control form-control-lg require" type="text" placeholder="">
                          Rua: <input name="rua" id="rua" value="{{$aluno->rua}}" required class="form-control form-control-lg require" type="text" placeholder="">
                          Número: <input name="numEnd" value="{{$aluno->numEnd}}" required class="form-control form-control-lg require" type="number" placeholder="">
                          Bairro: <input name="bairro" value="{{$aluno->bairro}}" required id="bairro" class="form-control form-control-lg require" type="text" placeholder="">
                          Cidade: <input name="cidade" value="{{$aluno->cidade}}" required id="cidade" class="form-control form-control-lg require" type="text" placeholder="">
</br>
                          Estados: <select class="form-select" required value="{{$aluno->estado}}" id="estado" name="estado">
                            <option value="AC" @if($aluno->estado == 'AC') selected @endif >Acre</option>
                            <option value="AL" @if($aluno->estado == 'AL') selected @endif >Alagoas</option>
                            <option value="AP" @if($aluno->estado == 'AP') selected @endif >Amapá</option>
                            <option value="AM" @if($aluno->estado == 'AM') selected @endif >Amazonas</option>
                            <option value="BA" @if($aluno->estado == 'BA') selected @endif >Bahia</option>
                            <option value="CE" @if($aluno->estado == 'CE') selected @endif >Ceará</option>
                            <option value="DF" @if($aluno->estado == 'DF') selected @endif >Distrito Federal</option>
                            <option value="ES" @if($aluno->estado == 'ES') selected @endif >Espírito Santo</option>
                            <option value="GO" @if($aluno->estado == 'GO') selected @endif >Goiás</option>
                            <option value="MA" @if($aluno->estado == 'MA') selected @endif >Maranhão</option>
                            <option value="MT" @if($aluno->estado == 'MT') selected @endif >Mato Grosso</option>
                            <option value="MS" @if($aluno->estado == 'MG') selected @endif >Mato Grosso do Sul</option>
                            <option value="MG" @if($aluno->estado == 'MG') selected @endif >Minas Gerais</option>
                            <option value="PA" @if($aluno->estado == 'PA') selected @endif >Pará</option>
                            <option value="PB" @if($aluno->estado == 'PB') selected @endif >Paraíba</option>
                            <option value="PR" @if($aluno->estado == 'PR') selected @endif >Paraná</option>
                            <option value="PE" @if($aluno->estado == 'PE') selected @endif >Pernambuco</option>
                            <option value="PI" @if($aluno->estado == 'PI') selected @endif >Piauí</option>
                            <option value="RJ" @if($aluno->estado == 'RJ') selected @endif >Rio de Janeiro</option>
                            <option value="RN" @if($aluno->estado == 'RN') selected @endif >Rio Grande do Norte</option>
                            <option value="RS" @if($aluno->estado == 'RS') selected @endif >Rio Grande do Sul</option>
                            <option value="RO" @if($aluno->estado == 'RO') selected @endif >Rondônia</option>
                            <option value="RR" @if($aluno->estado == 'RR') selected @endif >Roraima</option>
                            <option value="SC" @if($aluno->estado == 'SC') selected @endif >Santa Catarina</option>
                            <option value="SP" @if($aluno->estado == 'SP') selected @endif >São Paulo</option>
                            <option value="SE" @if($aluno->estado == 'SE') selected @endif >Sergipe</option>
                            <option value="TO" @if($aluno->estado == 'TO') selected @endif >Tocantins</option>
</select>
                        <script>$("#estado option:selected").val("MG")</script>
                        Curso: <select name="curso" required value="{{$aluno->curso}}" id="curso" class="form-select">
                               @foreach($cursos->all() as $curso)
                                <option name="curso" value="{{$curso->cdCurso}}" >{{$curso->nmCurso}}</option>
                                @endforeach
                        </select></br>
                        Turma: <input name="turma" required value="{{$aluno->turma}}" class="form-control form-control-lg require" type="text" placeholder="">
                        Data de Matricula: <input name="dtMatricula" required value="{{$aluno->dtMatricula}}" id="dtMatricula" class="form-control form-control-lg require" type="date" placeholder="">

                        <div class="form-group">
                            <label for="image" class="text-info">Foto do aluno:</label>
                            <input type="file" required name="image">
                        </div>
</br>
                        <button type="submit" class="btn btn-success">Editar</button>
                        <a type="submit" href="/listAluno" class="btn btn-danger">Voltar</a>






                    </form>
                    </br></br>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
