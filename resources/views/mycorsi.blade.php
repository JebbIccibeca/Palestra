@extends('layouts.dashboardlay')
@section('title','abbonati')
@section('content')
@php
    use Carbon\Carbon;
@endphp
<div class="container col-start-2 col-end-7 rounded" style="background-color: #222833">
    <h1 class="mt-8 ml-8 text-blue-500 uppercase" style="font-size: 45px">
        I miei Acquisti
    </h1>
    <div class="features-inner section-inner has-bottom-divider ">
        <div class="features-wrap ">

            @foreach ($acquisto as $item)
            <div class="max-w-md mx-auto rounded-xl shadow-md overflow-hidden md:max-w-2xl mt-2 mb-8 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110 border-black border-1" style="background-color: #2c3442; z-index: 50;">
                <div class="md:flex">
                  <div class="md:flex-shrink-0">
                    <img class="h-full w-full object-cover md:w-48" src="{{ asset('copertine/' . $item->image) }}" alt="Man looking at item at a store">
                  </div>
                  <div class="p-8">

                    <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold inline-block align-end">
                        {{$item['nome']}}
                        <div class=" justify-end inline-flex">
                            {{$item['durata']}}'
                        </div>
                    </div>

                    <a href="#" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">{{$item['descrizione']}}</a>
                    <p class="mt-2 text-gray-400">{{$item['tipo']}}.<br />
                        Comprato il: {{$item['created_at']}}<br />
                        Scade il: {{$item['scade']}}
                    </p>
                  </div>
                </div>
              </div>
            @endforeach

        </div>
    </div>
</div>


@endsection
