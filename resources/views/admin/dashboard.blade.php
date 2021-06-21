@extends ('admin.layouts.adminlay')

@section('content')


<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Inserisci i corsi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item active">Dashboard upload</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="flex h-screen">
    <div class="md:grid md:grid-cols-3 md:gap-6 ml-auto mr-auto">
      <div class="mt-5 md:mt-0 md:col-span-2">

        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-3 py-4 bg-white space-y-6 sm:p-6">
                @if (session('success'))
              <p class="text-green-600 bg-green-900 rounded-lg text-center p-3 m-3">
                {{ session('success') }}
                <svg xmlns="http://www.w3.org/2000/svg" class="animate-bounce h-6 w-6 inline-flex" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </p>
            @endif
              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                  <label class="block text-sm font-medium text-gray-700">
                    Nome
                  </label>
                    <input type="text" name="nome" required class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="....">
                </div>
              </div>

              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                  <label class="block text-sm font-medium text-gray-700">
                    Descrizione
                  </label>
                    <input type="text" name="descrizione" required class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="...">
                </div>
              </div>

              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                  <label class="block text-sm font-medium text-gray-700">
                    Tipo
                  </label>
                    <input type="text" name="tipo"  required class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="...">
                </div>
              </div>

              <div class="grid grid-cols-3 gap-6 mt-4">
                <div class="col-span-3 sm:col-span-2">
                  <label class="block text-sm font-medium text-gray-700">
                    Durata in minuti <a class="text-gray-200">scroll</a>
                  </label>
                    <input type="number" name="durata"  value="0" min="0" required class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="...">
                </div>
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700">
                  Copertina
                </label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                  <div class="space-y-1 text-center">
                    <font face="Comic sans MS" size="5" style="color: grey;">drag and drop   .jpeg</font>
                    <div id="drop-area">
                          <input type="file" id="fileElem" required name="img" id="fileElem" accept=".jpeg" multiple accept="image/*" onchange="handleFiles(this.files)">
                          <label class="button" for="fileElem">Seleziona file</label>
                          <br />
                        <progress id="progress-bar" max=100 value=0></progress>
                        <div id="gallery"></div>
                      </div>
                  </div>
                </div>

                  <div class="grid grid-cols-3 gap-6 mt-4">
                    <div class="col-span-3 sm:col-span-2">
                      <label class="block text-sm font-medium text-gray-700">
                        Numero massimo di partecipanti <a class="text-gray-200">scroll</a>
                      </label>
                        <input type="number" name="nmax"  value="0" min="0" required class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="...">
                    </div>
                  </div>

                  <div class="grid grid-cols-3 gap-6 mt-4">
                    <div class="col-span-3 sm:col-span-2">
                      <label class="block text-sm font-medium text-gray-700" >
                        Quanto costa? <a class="text-gray-200">scroll</a>
                      </label>
                        <input placeholder="€" type="number" name="prezzo"  value="0" min="0" required class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="...">
                    </div>
                    <p class=" mt-9" style="position:absolute;">
                        €
                    </p>
                  </div>

                  <div class="grid grid-cols-3 gap-6 mt-4">
                    <div class="col-span-3 sm:col-span-2">
                      <label class="block text-sm font-medium text-gray-700">
                        Seleziona istruttore
                      </label>
                      <select name="istruttore" class="text-black">

                        @foreach ($istruttori as $item)
                        <option value="{{$item['id_istr']}}">{{ $item['nome_istr'] .' '. $item['cognome'] }}</option>
                        @endforeach

                      </select>
                    </div>
                  </div>

              </div>
            </div>

            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Salva
              </button>

            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


  <style>
      /* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}


label>a:hover {
    color: black !important;
}


#drop-area {
  border: 2px dashed #ccc;
  border-radius: 20px;
  width: 480px;
  font-family: sans-serif;
  margin: 20px auto;
  padding: 20px;
}
#drop-area.highlight {
  border-color: purple;
}
p {
  margin-top: 0;
}
.my-form {
  margin-bottom: 10px;
}
#gallery {
  margin-top: 10px;
}
#gallery img {
  width: 150px;
  margin-bottom: 10px;
  margin-left: 32%;

  vertical-align: middle;
}
.button {
  display: inline-block;
  padding: 10px;
  background: #ccc;
  cursor: pointer;
  border-radius: 5px;
  border: 1px solid #ccc;
}
.button:hover {
  background: #ddd;
}
#fileElem {
  display: none;
}

  </style>
  <script>
      // ************************ Drag and drop ***************** //
let dropArea = document.getElementById("drop-area")

// Prevent default drag behaviors
;['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
  dropArea.addEventListener(eventName, preventDefaults, false)
  document.body.addEventListener(eventName, preventDefaults, false)
})

// Highlight drop area when item is dragged over it
;['dragenter', 'dragover'].forEach(eventName => {
  dropArea.addEventListener(eventName, highlight, false)
})

;['dragleave', 'drop'].forEach(eventName => {
  dropArea.addEventListener(eventName, unhighlight, false)
})

// Handle dropped files
dropArea.addEventListener('drop', handleDrop, false)

function preventDefaults (e) {
  e.preventDefault()
  e.stopPropagation()
}

function highlight(e) {
  dropArea.classList.add('highlight')
}

function unhighlight(e) {
  dropArea.classList.remove('active')
}

function handleDrop(e) {
  var dt = e.dataTransfer
  var files = dt.files

  handleFiles(files)
}

let uploadProgress = []
let progressBar = document.getElementById('progress-bar')

function initializeProgress(numFiles) {
  progressBar.value = 0
  uploadProgress = []

  for(let i = numFiles; i > 0; i--) {
    uploadProgress.push(0)
  }
}

function updateProgress(fileNumber, percent) {
  uploadProgress[fileNumber] = percent
  let total = uploadProgress.reduce((tot, curr) => tot + curr, 0) / uploadProgress.length
  console.debug('update', fileNumber, percent, total)
  progressBar.value = total
}

function handleFiles(files) {
  files = [...files]
  initializeProgress(files.length)
  files.forEach(uploadFile)
  files.forEach(previewFile)
}

function previewFile(file) {
  let reader = new FileReader()
  reader.readAsDataURL(file)
  reader.onloadend = function() {
    let img = document.createElement('img')
    img.src = reader.result
    document.getElementById('gallery').appendChild(img)
  }
}

function uploadFile(file, i) {
  var url = 'https://api.cloudinary.com/v1_1/joezimim007/image/upload'
  var xhr = new XMLHttpRequest()
  var formData = new FormData()
  xhr.open('POST', url, true)
  xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest')

  // Update progress (can be used to show progress indicator)
  xhr.upload.addEventListener("progress", function(e) {
    updateProgress(i, (e.loaded * 100.0 / e.total) || 100)
  })

  xhr.addEventListener('readystatechange', function(e) {
    if (xhr.readyState == 4 && xhr.status == 200) {
      updateProgress(i, 100) // <- Add this
    }
    else if (xhr.readyState == 4 && xhr.status != 200) {
      // Error. Inform the user
    }
  })

  formData.append('upload_preset', 'ujpu6gyk')
  formData.append('file', file)
  xhr.send(formData)
}
  </script>

@endsection
