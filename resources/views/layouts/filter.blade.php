
<div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased text-gray-800" >
    <div class=" flex flex-col left-0 w-64 h-screen top-50 shadow-lg ">

        <div class="overflow-y-hidden overflow-x-hidden flex-grow ">
        <ul class="flex flex-col py-6 space-y-1 ">

            <li>
            <p class="relative flex flex-row items-center h-11 focus:outline-none text-gray-500  border-l-4 border-transparent pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                      </svg>
                </span>
                <span class="ml-2 font-semibold text-sm tracking-wide truncate font-sans">Filtri</span>
            </p>
            <li>
                <div class="form-group m-2">
                    <select name="prezzo" id="prezzo" class="ml-3 form-control input-lg dynamic w-48 mb-2 rounded-sm text-white" data-dependent="state" style="background-color: #222833">
                        <option value="">prezzo</option>
                    </select>
                    <select name="nome_istr" id="nome_istr" class="ml-3 form-control input-lg dynamic w-48 mb-2 rounded-sm text-white" data-dependent="state" style="background-color: #222833">>
                        <option value="">istruttore</option>
                    </select>
                </div>
            </li>
        </ul>
        </div>
    </div>
</div>
