<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastro de Aluno') }}


        </h2>
    </x-slot>

    <script src="{{asset('/js/endereco.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <h4>{{ __('Dashboard') }}</h4> <h4 style="padding: 5%"> |</h4>
                    </x-nav-link>
                    <x-nav-link :href="route('listAluno')" :active="request()->routeIs('listAluno')">
                    <h4>{{ __('Lista de Alunos') }}</h4>
                    </x-nav-link>

                    @if($errors->all())
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">
                                    {{$error}}
                                    </div>
                                    @endforeach
                            @endif

                <form action="/salvarAluno" method="post" enctype="multipart/form-data">
                    @csrf
                        Nome do Aluno: <input name="aluno" class="form-control form-control-lg require" required type="text" placeholder="">
                        Matricula: <input name="matricula" class="form-control form-control-lg require"required type="number" placeholder="000000">
                        Situação do Aluno: <select class="form-select" style="margin-top: 1%" name="situacaoalu" required aria-label="Default select example">
                            <option value="ativo">Ativo</option>
                            <option value="inativo">Inativo</option>
                          </select></br>
                          CEP: <input name="cep" id="cep" onblur="buscaEndeco()" required class="form-control form-control-lg require" type="text" placeholder="">
                          Rua: <input name="rua" id="rua" class="form-control form-control-lg require" required type="text" placeholder="">
                          Número: <input name="numEnd" class="form-control form-control-lg require" type="number" required placeholder="">
                          Bairro: <input name="bairro" id="bairro" class="form-control form-control-lg require" type="text" required placeholder="">
                          Cidade: <input name="cidade" id="cidade" class="form-control form-control-lg require" type="text" required placeholder="">
</br>
                          Estados: <select class="form-select" id="estado" required name="estado">
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                        </select>
                        Curso: <select name="curso" id="curso" required class="form-select">
                               @foreach($cursos->all() as $curso)
                                <option name="curso" value="{{$curso->cdCurso}}" >{{$curso->nmCurso}}</option>
                                @endforeach
                        </select></br>
                        Turma: <input name="turma" required class="form-control form-control-lg require" type="text" placeholder="">
                        Data de Matricula: <input required name="dtMatricula" id="dtMatricula" class="form-control form-control-lg require" type="date" placeholder="">

                        <div class="form-group">
                            <label for="image" class="text-info">Foto do aluno:</label>
                            <input type="file" required name="image">
                        </div>
</br></br>
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </form>







                    </br></br>
                    @isset($msg)<div style="background-color: green; color: white" id="msg" class="alert alert-sucess">
                     <h4>{{$msg}}</h4>
                    </div>@endisset
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
