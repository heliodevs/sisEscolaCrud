<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edição de Curso') }}


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

                    <form action="/editCursoSalv" method="post" enctype="multipart/form-data">

                    @csrf
                        <input type="hidden" name="id" value="{{$curso->id}}">
                        Nome do Curso: <input name="nmCurso" value="{{$curso->nmCurso}}" required class="form-control form-control-lg require" type="text" placeholder="">
                        Código do Curso: <input name="cdCurso" value="{{$curso->cdCurso}}" required class="form-control form-control-lg require" type="number" placeholder="000000">
                        </br><button type="submit" class="btn btn-success">Editar</button>
                        <a type="submit" href="/listCurso" class="btn btn-danger">Voltar</a>
                    </form>
                    </br></br>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
