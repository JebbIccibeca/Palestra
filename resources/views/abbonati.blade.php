@extends('layouts.dashboardlay')
@section('title','abbonati')
@section('content')

<main>
    <div class="py-12">
        <div class="max-w-md mx-auto bg-gray-300 shadow-lg rounded-lg md:max-w-5xl" style="background-color: #2C3039">
            <div class="md:flex ">
                <div class="w-full p-4 px-5 py-5">
                    <div class="md:grid md:grid-cols-3 gap-2 " style="background-color: #2C3039">
                        <div class="rounded overflow-visible col-span-2 p-5">
                            <h1 class="text-xl font-medium text-gray-100 block ">Shopping Cart</h1>


                            <div class="flex justify-between items-center mt-6 pt-6">
                                <div class="pricing-tables-wrap ml-28 mr-28">
                                    <div class="pricing-table">
                                        <div class="pricing-table-inner is-revealing">
                                            <div class="pricing-table-main">
                                                <div class="pricing-table-header pb-17 h-28">
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
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="flex justify-between items-center mt-6 pt-6 border-t">
                                <div class="flex items-center"> <i class="fa fa-arrow-left text-sm pr-2"></i> <span class="text-md font-medium text-blue-500"><a href="dashboard">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                                      </svg>
                                </a></span> </div>
                                <a class=" w-2/3" href="/abbonato">
                                    <button class="w-full py-3 bg-blue-500 rounded focus:outline-none text-white hover:bg-blue-600">
                                        Acquista
                                    </button>
                                </a>
                                <div class="flex justify-center items-end"> <span class="text-sm font-medium text-gray-400 mr-1 mb-1 pl-3">Totale:</span> <span class="text-lg font-bold text-white "> €43</span> </div>
                            </div>
                        </div>
                        <div class="p-5 rounded overflow-visible"> <span class="text-xl font-medium text-gray-100 block pb-3">Dettagli pagamento</span> <span class="text-xs text-gray-400 ">Tipo di carta</span>
                            <div class="overflow-visible flex justify-between items-center mt-2">
                                <div class=" zoom rounded w-52 h-28 bg-gray-500 py-2 px-4 relative right-10"> <span class="italic text-lg font-medium text-gray-200 underline">VISA</span>
                                    <div class="flex justify-between items-center pt-4 "> <span class="text-xs text-gray-200 font-medium">****</span> <span class="text-xs text-gray-200 font-medium">****</span> <span class="text-xs text-gray-200 font-medium">****</span> <span class="text-xs text-gray-200 font-medium">****</span> </div>
                                    <div class="flex justify-between items-center mt-3"> <span class="text-xs text-gray-200">Marco Guastella</span> <span class="text-xs text-gray-200">12/18</span> </div>
                                </div>
                                <div class="flex justify-center items-center flex-col"> <img src="https://img.icons8.com/color/96/000000/mastercard-logo.png" width="40" class="relative right-5 " /> <span class="text-xs font-medium text-gray-200 bottom-2 relative right-5">mastercard.</span> </div>
                            </div>
                            <div class="flex justify-center flex-col pt-3"> <label class="text-xs text-gray-400 ">Nome sulla carta</label> <input type="text" class="focus:outline-none w-full h-6 bg-gray-800 text-white placeholder-gray-300 text-sm border-b border-gray-600 py-4" placeholder="Marco Guastella"> </div>
                            <div class="flex justify-center flex-col pt-3"> <label class="text-xs text-gray-400 ">Numero carta</label> <input type="text" class="focus:outline-none w-full h-6 bg-gray-800 text-white placeholder-gray-300 text-sm border-b border-gray-600 py-4" placeholder="**** **** **** ****"> </div>
                            <div class="grid grid-cols-3 gap-2 pt-2 mb-3">
                                <div class="col-span-2 "> <label class="text-xs text-gray-400">Data di scadenza</label>
                                    <div class="grid grid-cols-2 gap-2"> <input type="text" class="focus:outline-none w-full h-6 bg-gray-800 text-white placeholder-gray-300 text-sm border-b border-gray-600 py-4" placeholder="mm"> <input type="text" class="focus:outline-none w-full h-6 bg-gray-800 text-white placeholder-gray-300 text-sm border-b border-gray-600 py-4" placeholder="yyyy"> </div>
                                </div>
                                <div class=""> <label class="text-xs text-gray-400">CVV</label> <input type="text" class="focus:outline-none w-full h-6 bg-gray-800 text-white placeholder-gray-300 text-sm border-b border-gray-600 py-4" placeholder="XXX"> </div>
                            </div>
                            @if (session('abb'))
                                <div id="chiudi" class="relative z-30">

                                    <p class="text-green-500 bg-green-700 rounded-lg text-center p-1 m-3">
                                        {{ session('abb') }}
                                        <svg xmlns="http://www.w3.org/2000/svg" class="animate-bounce h-6 w-6 inline-flex" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <button class="float-right mr-4" onclick="myFunction()">X</button>
                                    </p>
                                </div>
                            @endif
                            @if (session('abbno'))
                                <div id="chiudi" class="relative z-30">
                                    <p class="text-red-700 bg-red-500 rounded-lg text-center w-full py-2 m-3">
                                        {{ session('abbno') }}
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 animate-bounce inline-flex" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
