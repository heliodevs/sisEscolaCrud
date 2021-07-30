<x-app-layout>

    <x-slot name="header">


        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Alunos') }}
        </h2>
    </x-slot>
    <!-- Última versão CSS compilada e minificada -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Tema opcional -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Última versão JavaScript compilada e minificada -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/5c1e1f3daa.js" crossorigin="anonymous"></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                            <h4>{{ __('Dashboard') }}</h4> <h4 style="padding: 5%"> |</h4>
                                        </x-nav-link>
                                        <x-nav-link :href="route('cadAluno')" :active="request()->routeIs('cadAluno')">
                                            <h4>{{ __('Cadastro de Alunos') }}</h4>
                                        </x-nav-link>

</br>

                    <form id="search-form" class="form" action="{{route('buscaAluno')}}" method="get">
                        <div class="form-group">

                            Pesquisar Aluno por Matricula:<input type="text" name="pesquisa" id="pesquisa"  class="form-control" placeholder="Pesquisar aluno.." />
                    </div>
                    <input type="submit" name="submit" class="btn btn-info btn-md" value="Pesquisar">
                </form>
                <br>
</div>
                <div class="p-6 bg-white border-b border-gray-200">



                @isset($msg)<div style="background-color: green; color: white" id="msg" class="alert alert-sucess">
                     <h4>{{$msg}}</h4></div>@endisset

                <ul class="list-group">
                    @if(count($alunos->all()) == 0)
                        Nenhum aluno cadastrado
                    @endif
                    @foreach($alunos->all() as $aluno)


                <div class="row">
                <div class="col-sm"> <li class="list-group-item">

                <h4>{{$aluno->aluno}} | Matricula: {{$aluno->matricula}}</h4></b> </div>
                <div class="col-sm" style=" margin-left: 2%"> <a type="button" href="{{route('editAluno',['alunoid'=>$aluno->id])}}"><i class="fas fa-edit"> Editar</i></a>
                <a style="color: red" class="delete" onclick="return confirm('Tem certeza que deseja excluir?')" type="button" href="{{route('delAluno',['alunoid'=>$aluno->id])}}"><i class="fas fa-trash-alt"> Excluir</i></a></div>

            </li>
                 </div>
                @endforeach

                </ul>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
