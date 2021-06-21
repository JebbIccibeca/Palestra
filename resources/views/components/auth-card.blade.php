<link rel="stylesheet" href="dist/css/style.css">

<div class="w-full h-screen flex overflow-hidden">
    <div class="hero-figure anime-element">
        <svg class="placeholder" width="900" height="396" viewBox="0 0 528 396">
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
    <div class="flex flex-col justify-center items-center w-5/12 shadow-lg" style="z-index: 50;">
        <div class="bg-opacity-50 bg-gray-900 px-5 py-8 rounded-lg w-60 mr-44 lg:mr-0 lg: lg:w-96">
         {{ $slot }}
        </div>
    </div>
  </div>
