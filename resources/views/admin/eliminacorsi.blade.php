@extends ('admin.layouts.adminlay')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Modifica Corsi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item active">Dashboard eliminacorsi</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="table w-full p-2">
    @if (session('eliminato'))
        <p class="text-green-500 bg-green-700 rounded-lg text-center p-1 m-3">
            {{ session('eliminato') }}
            <svg xmlns="http://www.w3.org/2000/svg" class="animate-bounce h-6 w-6 inline-flex" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </p>
    @endif
    @if (session('modificato'))
        <p class="text-green-600 bg-green-900 rounded-lg text-center p-3 m-3">
            {{ session('modificato') }}
            <svg xmlns="http://www.w3.org/2000/svg" class="animate-bounce h-6 w-6 inline-flex" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </p>
    @endif
    <table class="w-full border">
        <thead>
            <tr class="bg-gray-50 border-b">
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        ID
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Nome
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Descrizione
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Copertina
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Tipo
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Durata
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        N. max iscritti
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        N. iscritti
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Prezzo
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                         Istruttore
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                         Created at
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Updated at
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">

                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($array['upload'] as $item)
            <tr class="bg-gray-100 text-center border-b text-sm text-gray-600 overflow-auto">
                    <td class="p-2 border-r">{{$item['id_cors']}}</td>
                    <td class="p-2 border-r">{{$item['nome']}}</td>
                    <td class="p-2 border-r">{{$item['descrizione']}}</td>
                    <td class="p-2 border-r">{{$item['image']}}</td>
                    <td class="p-2 border-r">{{$item['tipo']}}</td>
                    <td class="p-2 border-r">{{$item['durata']}}</td>
                    <td class="p-2 border-r">{{$item['nmax']}}</td>
                    <td class="p-2 border-r">{{$item['niscr']}}</td>
                    <td class="p-2 border-r">{{$item['prezzo']}}</td>
                    <td class="p-2 border-r">{{$item['nome_istr']}}</td>
                    <td class="p-2 border-r">{{$item['created_at']}}</td>
                    <td class="p-2 border-r">{{$item['updated_at']}}</td>
                <td>
                    <div class="flex">
                        <a href="{{'editcorsi/'.$item['id_cors']}}"class="bg-green-500 p-2 text-white hover:shadow-lg text-xs font-thin">Modifica</a>
                        <a onclick="return confirm( 'Sei sicuro di voler eliminare {{$item['nome']}}?')" href="{{"delete/".$item['id_cors']}}"class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin relative">Elimina</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@yield('editcorsi')
@endsection
