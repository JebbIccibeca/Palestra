@extends('layouts.dashboardlay')
@section('content')

<div x-data="{ sidebarOpen: true }" class="flex overflow-x-hidden h-screen">
    <aside class="flex-shrink-0 w-64 flex flex-col border-r transition-all duration-300" :class="{ '-ml-64': !sidebarOpen }">
      <div class="h-64 bg-gray-900"></div>
      @include('istruttore.layouts.istrlay')
    </aside>
    <div class="flex-1">
      <header class="flex items-center p-4 text-semibold text-gray-100" style="background-color: #1D2026">
        <button style="outline: none;" class="p-1 mr-4 transform hover:scale-125 " @click="sidebarOpen = !sidebarOpen">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
        I miei corsi
      </header>

      <main class="p-4">


        <div class="grid grid-cols-2 col-span-1 gap-4 ">

            @foreach ($array['corsi'] as $i=>$item)
                <div class="rounded-md lg:flex h-60 m-3 overflow-hidden p-3 transform transition duration-500 hover:scale-110" style="background-color: #242830">
                    <div class="rounded-sm lg:h-auto lg:w-48 flex bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url( {{ asset('copertine/' . $item->image) }} ) ">
                    </div>
                    <div class=" rounded-b lg:rounded-b-none lg:rounded-r p-2 flex flex-col justify-between leading-normal">
                        <div class="">
                            <p class="text-sm text-grey-dark flex items-center">
                            <svg fill="white" class="text-grey w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                            </svg>
                            </p>
                            <div class="text-white font-bold text-xl">{{$item->nome}}</div>
                            <p class="text-white lg:text-sm text-m mb-2">{{$array['corsi'][$i]->name}}  {{$array['corsi'][$i]->surname}}       <br />{{$item->descrizione}} </p>
                        </div>
                    </div>
                    <div class="m-2 text-justify text-sm">
                        <p class="text-right text-xs">{{$item->created_at}}</p>
                    </div>
                </div>
            @endforeach


    </div>








      </main>

    </div>
  </div>



@endsection
