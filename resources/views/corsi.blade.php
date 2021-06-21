@extends('layouts.dashboardlay')
@section('title','FitnessHouse')
@section('content')

<main>
    <section class="cta section">
        <div class="container">

            @php
                use App\Models\abbonamento;
                if (Auth::check()) {
                    $user = Auth::user()->id;
                    $abbon = abbonamento::select('id_abbo')->where('abbonamenti.id_utente','=', $user)->get();
                }else{
                    $abbon = NULL;
                }
            @endphp

            @if ($abbon == '[]')
                <div class="cta-inner section-inner">
                    <h3 class="section-title mt-0">Vuoi avere uno sconto su tutti i corsi?</h3>
                    <div class="cta-cta">
                        <a class="button button-primary button-wide-mobile" href="/abbonamenti">Abbonati</a>
                    </div>
                </div>
            @endif



            @if (session('cegia'))
                <div id="chiudi" class="relative z-30">

                    <p class="text-red-700 bg-red-500 rounded-lg text-center p-1 m-3">
                        {{ session('cegia') }}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 animate-bounce inline-flex" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <button class="float-right mr-4" onclick="myFunction()">X</button>
                    </p>
                </div>
            @endif

            @if (session('ce'))
            <div id="chiudi" class="relative z-30">

                <p class="text-green-500 bg-green-700 rounded-lg text-center p-1 m-3">
                    {{ session('ce') }}
                    <svg xmlns="http://www.w3.org/2000/svg" class="animate-bounce h-6 w-6 inline-flex" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <button class="float-right mr-4" onclick="myFunction()">X</button>
                </p>
            </div>
            @endif

            <script>
                function myFunction() {
                    var x = document.getElementById("chiudi");
                    if (x.style.display === "none") {
                    x.style.display = "block";
                    } else {
                    x.style.display = "none";
                    }
                }
            </script>
        </div>
    </section>
    <section class="hero">
        <div class="container border-l-2  border-white rounded-md overflow-x-scroll overflow-y-hidden lg:overflow-visible">
            <h1 class="hero-title mt-0">Sei un appassionato di combattimento?</h1>
            <div class="hero-inner ">


                <div class="containerr">


                    @foreach ($combatti as $item)

                    <div class="card" style="z-index:50">
                        <p class="text-xs inline ml-3">{{$item['prezzo']}}</p><p class="text-xs inline">€</p><p class="text-xs inline">&nbsp;al mese</p>
                        <p class="text-xs inline ml-3">{{$item['niscr']}}/{{$item['nmax']}} iscritti</p>

                        <h3 class="title mt-2">{{$item['nome']}}</h3>

                      <div class="mt-7 w-48 mr-32">
                        <p class="text-xs inline ml-3">{{$item['descrizione']}}</p><br>
                      </div>

                        <div class="bar">
                          <div class="emptybar mb-3"></div>
                          <div class="filledbar"></div>
                          <div class=" flex items-end bg-cover h-40 w-40 flex-noner rounded lg:rounded text-center" style="background-image: url( {{ asset('copertine/' . $item->image) }} ) ">
                            <form action="/add_to_cart" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$item['id_cors']}}">
                                <button class=" p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                    <svg style="fill: #2e7dfc;" class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </button>
                            </form>
                        </div>
                        </div>
                      </div>
                    @endforeach

                  </div>


                <div class="hero-figure anime-element">
                    <svg class="placeholder" width="528" height="396" viewBox="0 0 528 396">
                        <rect width="528" height="396" style="fill:transparent;" />
                    </svg>
                    <div class="hero-figure-box hero-figure-box-01" data-rotation="45deg"></div>
                    <div class="hero-figure-box hero-figure-box-02" data-rotation="-45deg"></div>
                    <div class="hero-figure-box hero-figure-box-03" data-rotation="0deg"></div>
                    <div class="hero-figure-box hero-figure-box-04" data-rotation="-135deg"></div>
                    <div class="hero-figure-box hero-figure-box-05"></div>
                    <div class="hero-figure-box hero-figure-box-06"></div>
                    <div class="hero-figure-box hero-figure-box-07"></div>
                    <div class="hero-figure-box hero-figure-box-08" data-rotation="-22deg"></div>
                    <div class="hero-figure-box hero-figure-box-09" data-rotation="-52deg"></div>
                    <div class="hero-figure-box hero-figure-box-10" data-rotation="-50deg"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="features section m-auto w-11/12 ">

    <div x-data="{ sidebarOpen: false }" class="flex h-full" style="background-color: #222833">

            <aside class="flex-shrink-0 w-56 flex flex-col transition-all duration-300" :class="{ '-ml-64': !sidebarOpen }" >
                <div class="col">
                    @include('layouts.filter')
                </div>
            </aside>

            <div class="container col-start-2 col-end-7 xsm:col-start-1 xsm:col-end-2" >
                <button style="outline: none;" class="p-1 mr-4 mt-10 mb-5 transform hover:scale-125 " @click="sidebarOpen = !sidebarOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                    <div class="features-wrap ">



                        @foreach ($corsi as $item)
                        <div class=" lg:w-1/4 p-4 transform transition duration-500 hover:scale-110 h-full">
                            <div class="c-cardshadow-md hover:shadow-xl rounded-lg flex flex-wrap overflow-hidden min-h-full" style="background-color: #242830; height: 600px">
                                <div class="w-full h-full">
                                    <div class="relative pb-48 overflow-hidden" style="background-size:cover; height: 45%;background-image: url( {{ asset('copertine/' . $item->image) }}">
                                        <form action="/add_to_cart" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$item['id_cors']}}">
                                            <button class=" p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 mt-3 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                                <svg style="fill: #2e7dfc;" class="h-8 w-8" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="p-4">
                                        <span class="inline-block px-2 py-1 leading-none bg-orange-200 text-orange-800 rounded-full font-semibold uppercase tracking-wide text-xs">{{$item['nome']}}</span>
                                        <p class="text-sm">{{$item['descrizione']}}</p>
                                        <div class="mt-2 flex items-center">
                                            <span class="font-bold text-lg">{{$item['prezzo']}}</span>&nbsp;<span class="text-sm font-semibold">€</span><span class="text-sm font-semibold">al mese</span>
                                            <span class="font-bold text-sm ml-2">iscritti:{{$item['niscr']}}/{{$item['nmax']}}</span>&nbsp;
                                        </div>
                                    </div>
                                    <div class="p-4 border-t border-b text-xs text-gray-700">
                                        <div>
                                            <span class="flex items-center">
                                                <i class="far fa-address-card text-gray-500 fa-fw font-bold mr-2 text-xsm uppercase">Tipo:</i> <p class="text-gray-500">{{$item['tipo']}}
                                            </span>
                                        </div>
                                        <span class="flex items-center">
                                            <i class="far fa-address-card text-gray-500 fa-fw font-bold mr-2 text-xsm uppercase">Istruttore:</i> <p class="text-gray-500">{{$item['nome_istr'].' '.$item['cognome']}}
                                        </span>
                                    </div>
                                    <div class="p-4 flex items-center text-sm text-gray-600"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current text-yellow-500"><path d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z"></path></svg><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current text-yellow-500"><path d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z"></path></svg><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current text-yellow-500"><path d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z"></path></svg><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current text-yellow-500"><path d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z"></path></svg><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current text-gray-400"><path d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z"></path></svg><span class="ml-2">@php echo rand(1, 50) @endphp Recensioni</span></div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                <div class="mt-3" style="margin-left: 43.5%;">
                    {{$corsi->links('pagination-links')}}
                </div>
            </div>

    </div>
    </section>


    @if ($abbon == '[]')
        <section class="pricing section">
            <div class="container-sm">
                <div class="pricing-inner section-inner">
                    <div class="pricing-header text-center">
                        <h2 class="section-title mt-0">Approfitta ora</h2>
                        <p class="section-paragraph mb-0">Esegui l'abbonamento per avere numerosi vantaggi!</p>
                    </div>
                    <div class="pricing-tables-wrap">
                        <div class="pricing-table">
                                <div class="pricing-tables-wrap">
                                    <div class="pricing-table">
                                        <div class="pricing-table-inner is-revealing">
                                            <div class="pricing-table-main">
                                                <div class="pricing-table-header pb-17">
                                                    <div class="pricing-table-price"><span class="pricing-table-price-currency h2">€</span><span class="pricing-table-price-amount h1">43</span><span class="text-xs uppercase">/l'anno</span></div>
                                                </div>
                                                <div class="pricing-table-features-title text-xs pt-5 pb-5 uppercase">Cosa otterrai</div>
                                                <ul class="pricing-table-features list-reset text-xs pt-5">
                                                    <li>
                                                        <span>1 anno di abbonamento</span>
                                                    </li>
                                                    <li>
                                                        <span>Sconto del 25% su tutti i servizi</span>
                                                    </li>
                                                    <li>
                                                        <span>Tessera di riconoscimento</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="pricing-table-cta mb-8 pt-5">
                                                <a class="button button-primary button-shadow button-block" href="/abbonamenti">Compra ora</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </section>
    @endif



</main>

@endsection
