@extends ('admin.layouts.adminlay')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Modifica utenti</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item active">Dashboard elimina utenti</li>
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
                        Cognome
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        cf
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Email
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
            @foreach ($Upload as $item)
            <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                @if (strtolower($item['name']) == 'admin')
                    <td class="p-2 border-r cursor-not-allowed">{{$item['id']}}</td>
                    <td class="p-2 border-r cursor-not-allowed">{{$item['name']}}</td>
                    <td class="p-2 border-r cursor-not-allowed">{{$item['surname']}}</td>
                    <td class="p-2 border-r cursor-not-allowed">{{$item['cf']}}</td>
                    <td class="p-2 border-r cursor-not-allowed">{{$item['email']}}</td>
                    <td>
                        <div class="flex items-center justify-content-center">
                            <a onclick="javascript:return false;" href="{{"editistr/".$item['id_istr']}}"class="bg-green-500 p-2 text-white hover:shadow-lg text-xs font-thin cursor-not-allowed">Modifica</a>
                            <a onclick="javascript:return false;" href="{{"deleteistr/".$item['id_istr']}}"class="cursor-not-allowed bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Elimina</a>
                        </div>
                    </td>
                @else
                    <td class="p-2 border-r">{{$item['id']}}</td>
                    <td class="p-2 border-r">{{$item['name']}}</td>
                    <td class="p-2 border-r">{{$item['surname']}}</td>
                    <td class="p-2 border-r">{{$item['cf']}}</td>
                    <td class="p-2 border-r">{{$item['email']}}</td>
                    <td >
                        <div class="flex items-center justify-content-center">
                            <a href="{{"editutent/".$item['id']}}"class="bg-green-500 p-2 text-white hover:shadow-lg text-xs font-thin ">Modifica</a>
                            <a onclick="return confirm( 'Sei sicuro di voler eliminare {{$item['name'].' '.$item['surname']}}?')" href="{{"deleteutent/".$item['id']}}"class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Elimina</a>
                        </div>
                    </td>
                @endif

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@yield('editutent')
@endsection
