<x-User-layout>

    <div class="grid md:grid-cols-1 xl:grid-cols-2">

        <div class="...">

            <style>
              html {
                background-image: url("https://images.freeimages.com/images/large-previews/a3b/website-rays-background-pattern-1637863.png");
              }
            </style>



            @foreach ($film as $item)

            <div class="">
                <div class="lg:flex m-9 flex-initial">
                    <div class="bg-cover h-60 w-44 flex-noner rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url( {{ asset('copertine/' . $item->image) }} ) ">
                    </div>
                    <div class="border-r border-b border-l border-grey-light lg:border-l-0 lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                      <div class="mb-8">
                        <p class="text-xs text-grey-dark flex items-center">
                            <button class="inline-block p-1 text-center text-white transition bg-indigo-500 rounded-full shadow ripple hover:shadow-lg hover:bg-indigo-600 focus:outline-none" style="height: 22px; width: 22px;">
                                {{$item['stock']}}
                            </button>&nbsp;disponibili.
                        </p>
                        <div class="text-black font-bold text-xl mb-2">{{$item['titolo']}}</div>
                        <p class="text-gray-600 text-base">Protagonista: {{$item['protagonista']}}.</p>
                        <p class="text-gray-600 text-base">Data d'uscita: {{$item['data_uscita']}}</p>
                        <p class="text-gray-600 text-base">Età minima: {{$item['etamin']}}+ | Prezzo {{$item['prezzo']}}€</p>
                      </div>
                      <div class="flex items-center">
                        <div class="flex">
                            <p class="text-black">{{$item['regista']}}</p>
                            <form action="/add_to_cart" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$item['id']}}">
                                <button class="bg-red-500 hover:bg-red-600 px-5 py-2 text-sm text-white uppercase rounded-full ml-24">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            @endforeach
    </div>

    {{--

    --}}


        <body class="bg-gray-100 ">
            <div class="container mx-auto mt-10 ml-35">
              <div class="flex shadow-md my-10">
                <div class="w-2/3 bg-white px-10 py-10">
                  <div class="flex justify-between border-b pb-8">
                    <h1 class="font-semibold text-2xl">Carrello</h1>@yield('ciao')
                    <h2 class="font-semibold text-2xl">{{-- {{$item['count']}} --}}
                    </h2>
                  </div>
                  <div class="flex mt-10 mb-5">
                    <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Film</h3>
                    <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 ml-10"> Prezzo </h3>
                  </div>

                  @foreach ($carrello as $item)
                  <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                    <div class="flex w-2/5"> <!-- product -->
                      <div class="">
                        <div class="bg-cover h-32 w-24 flex-noner rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url( {{ asset('copertine/' . $item->image) }} ) ">
                        </div>
                      </div>
                      <div class="flex flex-col justify-between ml-4 flex-grow">
                        <span class="font-bold text-sm">{{$item['titolo']}}</span>
                        <span class="text-red-500 text-xs">{{$item['regista']}}</span>
                        <a href="{{"deletecart/".$item['id_cart']}}"class="font-semibold hover:text-red-500 text-gray-500 text-xs">Elimina</a>
                      </div>
                    </div>
                    <span class="text-center w-1/5 font-semibold text-sm ml-10">{{'€' . $item['prezzo']}}</span>
                  </div>
                  @endforeach

                </div>

                <div id="summary" class="w-2/4 px-8 py-10 bg-gray-200">
                  <h1 class="font-semibold text-2xl border-b pb-8">Riepilogo ordine</h1>
                  <div class="py-10">
                    <label for="promo" class="font-semibold inline-block mb-3 text-sm uppercase">Promo Code</label>
                    <input type="text" id="promo" placeholder="Inserisci il tuo codice promozionale" class="p-2 text-sm w-full">
                  </div>
                  <button class="bg-red-500 hover:bg-red-600 px-5 py-2 text-sm text-white uppercase ">Applica</button>
                  <div class="border-t mt-8">
                    <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                      <span>Totale:</span>
                      <span>
                        {{$carrello->sum('prezzo')}}€
                      </span>
                    </div>
                    <a href="/dashboard/compra" class="bg-indigo-500 font-semibold hover:bg-indigo-600 px-5 py-2 text-sm text-white uppercase w-full">Compra</a>
                    @if (session('successo'))
              <p class="text-green-600 bg-green-900 rounded-lg text-center p-1 m-3">
                {{ session('successo') }}
                <svg xmlns="http://www.w3.org/2000/svg" class="animate-bounce h-6 w-6 inline-flex" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </p>
            @endif
                  </div>
                </div>

              </div>
            </div>
          </body>





      </div>

</x-User-layout>

