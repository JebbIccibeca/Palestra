    <x-User-layout>
        <!-- Container -->

          <div class="heading text-center font-bold text-2xl m-5 text-red-500 uppercase"> I tuoi film acquistati </div>

          <div class="holder mx-auto w-10/12 grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4">

            @foreach ($acquisto as $item)
            <div class="each mb-10 m-2 shadow-lg border-gray-800 bg-gray-100 relative">
              <img class="w-full" src="{{ asset('copertine/' . $item->image) }}" alt="" />
              <div class="badge absolute top-0 right-0 bg-indigo-500 m-1 text-gray-200 p-1 px-2 text-xs font-bold rounded">{{ $item['etamin'] }}+</div>
              <div class="info-box text-xs flex p-1 font-semibold text-gray-500 bg-gray-300">
                <span class="mr-1 p-1 px-2 font-bold">Comprato il</span>
                <span class="mr-1 p-1 px-2 font-bold border-l border-gray-400">{{ $item['created_at'] }}</span>
                <span class="mr-1 p-1 px-2 font-bold border-l border-gray-400">{{ $item['prezzo'] }}€</span>
              </div>
              <div class="desc p-4 text-gray-800">
                <a href="https://www.youtube.com/watch?v=dvqT-E74Qlo" target="_new" class="title font-bold block cursor-pointer hover:underline">{{ $item['titolo'] }}</a>
                <a href="https://www.youtube.com/user/sam14319" target="_new" class="badge bg-indigo-500 text-blue-100 rounded px-1 text-xs font-bold cursor-pointer">{{ $item['regista'] }}</a>
                <span class="description text-sm block py-2 border-gray-400 mb-2">Protagonista: {{ $item['protagonista'] }}</span>
              </div>
            </div>

            @endforeach


          </div>

</x-User-layout>
