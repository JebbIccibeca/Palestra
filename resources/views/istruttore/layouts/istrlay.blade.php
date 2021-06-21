
<div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-gray-50 text-gray-800">
    <div class=" flex flex-col left-0 w-64 h-screen top-50 shadow-lg" style="background-color: #1D2026">
        <div class="flex items-center pl-6 h-20 border-b border-gray-800">
            <img src="https://thumbs.dreamstime.com/z/insegnante-linea-icona-segno-di-vettore-del-profilo-pittogramma-lineare-dell-istruttore-di-stile-isolato-su-bianco-simbolo-del-92665319.jpg" alt="" class="rounded-full h-10 w-10 flex items-center justify-center mr-3 border-2 border-blue-500">
            <div class="ml-1">
                <p class="inline ml-1 text-md font-medium tracking-wide truncate text-gray-100 font-sans">{{$istruttore[0]->nome_istr}}</p><p class="inline ml-1 text-sm font-medium tracking-wide truncate text-gray-500 font-sans">#{{$istruttore[0]->id_istr}}</p>
                <div class="badge">
                       <span class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-blue-800 bg-blue-100 rounded-full">{{$istruttore[0]->contratto}}</span>
                </div>
                <span class="px-1 py-0.5 ml-auto text-xs font-medium tracking-wide text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    {{$istruttore[0]->infocontatto}}
                </span>
            </div>
        </div>
        <div class="overflow-y-auto overflow-x-hidden flex-grow">
        <ul class="flex flex-col py-6 space-y-1">
            <li class="px-5">
                <div class="flex flex-row items-center h-8">
                    <div class="flex font-semibold text-sm text-gray-300 my-4 font-sans uppercase">Dashboard Istruttore</div>
                </div>
            </li>
            <li>
                <a href="/dashboard" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-700 text-gray-500 hover:text-gray-200 border-l-4 border-transparent hover:border-blue-500 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    </span>
                    <span class="ml-2 font-semibold text-sm tracking-wide truncate font-sans">I miei corsi</span>
                </a>
            </li>
            <li>
                <a href="/miei" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-700 text-gray-500 hover:text-gray-200 border-l-4 border-transparent hover:border-blue-500 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                    </span>
                    <span class="ml-2 font-semibold text-sm tracking-wide truncate font-sans">I miei allievi</span>
                </a>
            </li>
        </ul>
        </div>
    </div>
    </div>

