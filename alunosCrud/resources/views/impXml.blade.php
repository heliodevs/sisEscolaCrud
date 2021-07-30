<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Importar XML') }}

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

                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <h4>{{ __('Dashboard') }}</h4>
                 </x-nav-link>
                 <x-nav-link :href="route('listCurso')" :active="request()->routeIs('listCurso')">
                    <h4>{{ __('Lista de Curso') }}</h4>
                    </x-nav-link>

                    <x-nav-link :href="route('cadastrarCurso')" :active="request()->routeIs('cadastrarCurso')">
                    <h4>{{ __('Cadastro de Curso') }}</h4>
                    </x-nav-link>
</br></br>

                    <form id="import-form" class="form" action="{{route('saveImport')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="file" name="xml" >
</br>
                    @if($errors->all())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                            {{$error}}
                            </div>
                            @endforeach
                    @endif

                    <input type="submit" name="submit" class="btn btn-info btn-md" value="Enviar">
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
