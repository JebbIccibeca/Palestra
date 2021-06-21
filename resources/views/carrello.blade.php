@extends('layouts.dashboardlay')
@section('title','carrello')
@section('content')
@php
    use App\Models\abbonamento;

    $somma = $carrello->sum('prezzo');
    $perc = 25;
    $risparmio = $perc / 100 * $somma;
    $sconto = $somma - $risparmio;

    $user = Auth::user()->id;
    $abbon = abbonamento::select('id_abbo')->where('abbonamenti.id_utente','=', $user)->get();
@endphp
<main>
    <div class="py-12" >
        <div class="max-w-md mx-auto shadow-lg rounded-lg md:max-w-5xl" style="background-color: #2C3039">
            <div class="md:flex ">
                <div class="w-full p-4 px-5 py-5">

                    @if ($abbon == '[]')
                    <div class="rounded-lg p-5 m-3 h-22" style="background-image: linear-gradient(to right bottom, #81fbb8, #6deea6, #59e194, #43d481, #28c76f);">
                        <div class="card_category">
                        <div class="card_text " >
                            <div class="contentextrat w-4/6 mr-2 flex">

                                <div class="flex-shrink ">
                                    <div class="category_title font-bold text-2xl text-gray-100 leading-tight ">Vuoi risparmiare sull'acquisto?</div>
                                    <div class="extratext text-gray-100 text-justify mr-24 lg:mr-0"> Che stai aspettando, abbonati per ottenere uno sconto su tutti i corsi!<br></div>
                                </div>
                                <div class="flex items-center mt-1">
                                    <a href="/abbonamenti" class="button bg-blue-500 hover:bg-blue-600 inline-block md:relative lg:relative absolute left-40" style="border-radius: 8px; color: white">Abbonati</a>
                                </div>

                            </div>
                        </div>
                        </div>
                    </div>
                    @endif



                    <div class="md:grid md:grid-cols-3 gap-2 " >

                        <div class="col-span-2 p-5">
                            <div class="flex justify-between items-center">
                                <h1 class="text-xl font-medium text-white w-1/3" >Carrello</h1>
                                @if ($abbon != '[]')
                                    <div class="ml-auto content-end ">
                                        <span class="text-sm font-medium text-gray-400">Grazie al tuo abbonamento stai risparmiando: {{$risparmio}}€</span>
                                    </div>
                                @endif
                            </div>

                            <span class="text-xs font-light text-gray-400"></span>



                            @foreach ($carrello as $item)

                                <div class="flex justify-between items-center mt-6 pt-6">
                                    <div class="flex items-center"> <img src="{{ asset('copertine/' . $item->image) }}" width="80" class="rounded-full ">
                                        <div class="flex flex-col ml-3">
                                            <span class="md:text-md font-medium">
                                                {{$item['nome']}}
                                            </span>
                                            <span class="text-xs font-light text-gray-400">
                                                #{{$item['id_cors']}}
                                            </span>

                                        </div>
                                    </div>
                                    <div class="ml-auto content-end" >
                                        <a href="{{"deletecart/".$item['id_cart']}}"class="font-semibold text-red-300 hover:text-red-500 text-gray-500 text-xs lg:m-0 ml-24" >Elimina</a>
                                    </div>

                                    <div class="flex justify-center items-center">
                                        <div class="pr-8 flex ">
                                        </div>
                                        <div class="pr-8 "> <span class="text-xs font-medium">
                                            @php
                                                $scontino = $item['prezzo'] - (25 /100 * $item['prezzo'])
                                            @endphp
                                            @if ($abbon != '[]')
                                            da {{$item['prezzo']}}€ a {{$scontino}}
                                            €
                                            @endif

                                        </span>
                                        </div>
                                        <div> <i class="fa fa-close text-xs font-medium"></i> </div>
                                    </div>
                                </div>

                            @endforeach





                            <div class="flex justify-between items-center mt-6 pt-6 border-t">
                                <div class="flex items-center"> <i class="fa fa-arrow-left text-sm pr-2"></i>
                                    <span class="text-md font-medium text-blue-500">
                                        <a href="dashboard">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                                            </svg>
                                        </a>
                                    </span>
                                </div>
                                <ul class="list-disc">
                                    @foreach ($nome as $item)
                                        @foreach ($carrello as $itemm)
                                            @if ($item['nome'] == $itemm['nome'])
                                                <li>{{  $item['nome']  }}<span> già acquistato.</span></li>

                                            @endif
                                        @endforeach
                                    @endforeach
                                </ul>

                                <div class="flex justify-center items-end">
                                    <span class="text-sm font-medium text-gray-400 mr-1 mb-1 pl-3">Totale:</span>
                                    <span class="text-lg font-bold text-white "> {{$sconto}}€</span> </div>
                                </div>
                        </div>
                        <div class=" p-5 rounded overflow-visible" style="background-color: #2C3039">
                            <span class="text-xl font-medium text-gray-100 block pb-3">Dettagli pagamento</span>
                            <span class="text-xs text-gray-400 ">Carta</span>
                            <div class="overflow-visible flex justify-between items-center mt-2">
                                <div class="zoom rounded w-52 h-28 bg-gray-500 py-2 px-4 relative right-10"> <span class="italic text-lg font-medium text-gray-200 underline">VISA</span>
                                    <div class="flex justify-between items-center pt-4 "> <span class="text-xs text-gray-200 font-medium">****</span> <span class="text-xs text-gray-200 font-medium">****</span> <span class="text-xs text-gray-200 font-medium">****</span> <span class="text-xs text-gray-200 font-medium">****</span> </div>
                                    <div class="flex justify-between items-center mt-3"> <span class="text-xs text-gray-200">Marco Guastella</span> <span class="text-xs text-gray-200">12/18</span> </div>
                                </div>
                                <div class="flex justify-center items-center flex-col"> <img src="https://img.icons8.com/color/96/000000/mastercard-logo.png" width="40" class="relative right-5" /> <span class="text-xs font-medium text-gray-200 bottom-2 relative right-5">mastercard.</span> </div>
                            </div>
                            <div class="flex justify-center flex-col pt-3"> <label class="text-xs text-gray-400 ">Nome sulla carta</label> <input type="text" class="focus:outline-none w-full h-6 bg-gray-800 text-white placeholder-gray-300 text-sm border-b border-gray-600 py-4" placeholder="Marco Guastella"> </div>
                            <div class="flex justify-center flex-col pt-3"> <label class="text-xs text-gray-400 ">Numero carta</label> <input type="text" class="focus:outline-none w-full h-6 bg-gray-800 text-white placeholder-gray-300 text-sm border-b border-gray-600 py-4" placeholder="**** **** **** ****"> </div>
                            <div class="grid grid-cols-3 gap-2 pt-2 mb-3">
                                <div class="col-span-2 "> <label class="text-xs text-gray-400">Data di scadenza</label>
                                    <div class="grid grid-cols-2 gap-2"> <input type="text" class="focus:outline-none w-full h-6 bg-gray-800 text-white placeholder-gray-300 text-sm border-b border-gray-600 py-4" placeholder="mm"> <input type="text" class="focus:outline-none w-full h-6 bg-gray-800 text-white placeholder-gray-300 text-sm border-b border-gray-600 py-4" placeholder="yyyy"> </div>
                                </div>
                                <div class=""> <label class="text-xs text-gray-400">CVV</label> <input type="text" class="focus:outline-none w-full h-6 bg-gray-800 text-white placeholder-gray-300 text-sm border-b border-gray-600 py-4" placeholder="XXX"> </div>
                            </div>
                            <a href="/dashboard/compra" class="">
                                <button class="h-12 w-full bg-blue-500 rounded focus:outline-none text-white hover:bg-blue-600">
                                    Acquista
                                </button>
                            </a>
                        </div>
                    </div>
                    @if (session('successo'))
                        <p class="text-green-500 bg-green-700 rounded-lg text-center p-1 m-3">
                            {{ session('successo') }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="animate-bounce h-6 w-6 inline-flex" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </p>
                    @endif
                    @if (session('errore'))
                        <div id="chiudi" class="relative z-30">

                            <p class="text-red-700 bg-red-500 rounded-lg text-center p-1 m-3">
                                {{ session('errore') }}
                                @foreach ($nome as $item)
                                    @foreach ($carrello as $itemm)
                                        @if ($item['nome'] == $itemm['nome'])
                                            {{  $itemm['nome']  }},
                                        @endif
                                    @endforeach
                                @endforeach
                                <svg xmlns="http://www.w3.org/2000/svg" class=" animate-bounce h-6 w-6 inline-flex" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                <button class="float-right mr-4" onclick="myFunction()">X</button>
                            </p>
                        </div>
                    @endif
                    @if (session('pieno'))
                        <div id="chiudi" class="relative z-30">

                            <p class="text-red-700 bg-red-500 rounded-lg text-center p-1 m-3">
                                {{ session('pieno') }} è attualmente al completo!
                                <svg xmlns="http://www.w3.org/2000/svg" class=" animate-bounce h-6 w-6 inline-flex" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                <button class="float-right mr-4" onclick="myFunction()">X</button>
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>



@endsection
