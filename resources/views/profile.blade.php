@extends('layouts.dashboardlay')
@section('title','profile')
@section('content')
@php
    use App\Models\abbonamento;
    if (Auth::check()) {
        $user = Auth::user()->id;
        $abbon = abbonamento::select('id_abbo')->where('abbonamenti.id_utente','=', $user)->get();
    }else{
        $abbon = NULL;
    }
@endphp
    <div class="flex justify-center">
        <div class="card  min-w-sm border border-gray-800 text-gray-50   transition-shadow shadow-xl hover:shadow-xl min-w-max h-full" style="background-color: #242830">
            <div class="w-full card__media">
                <img src="https://www.antelma.com/wp-content/uploads/2018/10/light-grey-low-poly-background-vector-e1491298829162-1024x571.jpg" class="h-48 w-96 relative">
                    @if ($abbon != '[]')
                        <div class="absolute top-6 right-28">
                            <svg
                            xmlns:dc="http://purl.org/dc/elements/1.1/"
                            xmlns:cc="http://creativecommons.org/ns#"
                            xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                            xmlns:svg="http://www.w3.org/2000/svg"
                            xmlns="http://www.w3.org/2000/svg"
                            id="svg4734"
                            version="1.1"
                            viewBox="0 0 54.175114 39.116997"
                            height="39.116997mm"
                            width="54.175114mm">
                            <defs
                                id="defs4728" />
                            <metadata
                                id="metadata4731">
                                <rdf:RDF>
                                <cc:Work
                                    rdf:about="">
                                    <dc:format>image/svg+xml</dc:format>
                                    <dc:type
                                    rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
                                    <dc:title></dc:title>
                                </cc:Work>
                                </rdf:RDF>
                            </metadata>
                            <g
                                transform="translate(66.39708,-99.036739)"
                                id="layer1">
                                <g
                                id="g9099"
                                transform="matrix(0.27539482,0,0,0.27539482,60.333862,131.21137)"
                                style="display:inline;stroke-width:0.96074188;stroke-miterlimit:4;stroke-dasharray:none">
                                <g
                                    style="stroke-width:0.37907794;stroke-miterlimit:4;stroke-dasharray:none"
                                    transform="matrix(2.5552825,0,0,2.5137239,948.91383,147.74554)"
                                    id="g9067">
                                    <path
                                    style="fill:#fee46e;fill-opacity:1;stroke:none;stroke-width:0.37907794;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
                                    d="m -484.92861,-69.60699 c 3.14841,-11.981014 7.45711,-20.705293 9.99109,-24.260749 -8.24441,2.537931 -14.08607,11.920807 -17.04582,17.834698 -1.1891,-7.022842 -1.14274,-16.90312 0.23245,-23.742098 -7.62915,4.471464 -11.71748,15.063897 -14.25625,20.846777 l -6.94357,-25.600368 -6.94355,25.600368 c -2.53878,-5.78288 -6.6271,-16.375313 -14.25625,-20.846777 1.37518,6.838978 1.42154,16.719256 0.23245,23.742098 -2.95976,-5.913891 -8.80141,-15.296767 -17.04582,-17.834698 2.53398,3.555456 6.84268,12.279735 9.99109,24.260749 z"
                                    id="path1049" />
                                    <path
                                    style="fill:#e7ce5a;fill-opacity:1;stroke:none;stroke-width:0.37907794;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
                                    d="m -512.94972,-96.467987 -5.04297,18.269379 c -0.56146,2.066384 -2.9958,2.302191 -3.84375,0.372344 -2.05241,-4.675022 -5.06496,-11.752156 -9.5293,-16.503072 0.56383,6.22683 0.34917,13.195371 -0.59375,18.764323 -0.37153,2.190762 -2.87836,2.680614 -3.8457,0.751475 -1.91568,-3.827716 -9.24175,-14.63711 -12.26172,-14.225918 1.87981,4.096617 4.76499,10.849089 6.48437,17.011626 h 28.63282 28.63086 c 1.71938,-6.162537 4.60456,-12.915009 6.48437,-17.011626 -3.01997,-0.411192 -10.34604,10.398202 -12.26172,14.225918 -0.96734,1.929139 -3.47417,1.439287 -3.8457,-0.751475 -0.94292,-5.568952 -1.15758,-12.537493 -0.59375,-18.764323 -4.46434,4.750916 -7.47689,11.82805 -9.5293,16.503072 -0.84795,1.929847 -3.28229,1.69404 -3.84375,-0.372344 z m 0,6.647541 3.3789,12.241647 c 0.4956,1.811456 1.91541,2.952514 3.33399,3.089923 1.42076,0.137629 2.98514,-0.717057 3.73047,-2.413364 1.50381,-3.425418 3.50953,-7.98335 6.07226,-11.905641 -0.0883,4.73448 0.0781,9.494044 0.7793,13.635635 0.076,0.448226 0.35801,0.734086 0.53515,1.112463 h -17.83007 -17.83008 c 0.17713,-0.378377 0.45915,-0.664237 0.53515,-1.112463 0.70129,-4.141591 0.8676,-8.901155 0.7793,-13.635635 2.56274,3.922291 4.56845,8.480223 6.07227,11.905641 0.74533,1.696307 2.30971,2.550993 3.73047,2.413364 1.41858,-0.13742 2.83838,-1.278467 3.33398,-3.089923 z m -32.69066,4.282278 c 3.2756,3.136582 6.25826,7.143019 8.50629,11.339442 l -3.74494,0.138943 c -0.9166,-3.041613 -3.63435,-8.675032 -4.76135,-11.478385 z m 64.90318,0.416853 c -1.127,2.803353 -3.24708,8.158874 -4.16368,11.200486 h -3.50587 c 2.36049,-4.49608 4.49799,-7.84021 7.66955,-11.200486 z"
                                    id="path4471" />
                                    <path
                                    style="fill:none;fill-opacity:1;stroke:#fff1a1;stroke-width:0.37907794;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
                                    d="m -476.57393,-91.245702 c -6.60663,2.865612 -11.82592,11.177744 -14.21322,15.947804 -0.58337,1.165172 -2.09729,0.868908 -2.32031,-0.454067 -1.04129,-6.149881 -1.11264,-14.097546 -0.26562,-20.746323 -5.60175,4.798208 -9.14175,13.081635 -11.4043,18.235332 -0.51156,1.163866 -1.97973,1.021529 -2.31836,-0.224762 l -5.74414,-21.179957 -5.74609,21.179957 c -0.33863,1.246291 -1.8068,1.388628 -2.31836,0.224762 -2.26256,-5.153701 -5.80256,-13.437126 -11.4043,-18.235332 0.84701,6.648776 0.77566,14.596445 -0.26562,20.746323 -0.22301,1.322994 -1.73695,1.61926 -2.32032,0.454067 -2.3873,-4.770063 -7.82097,-13.331409 -14.42761,-16.32163"
                                    id="path8243" />
                                    <path
                                    id="path4473"
                                    d="m -484.92861,-69.60699 c 3.14841,-11.981014 7.45711,-20.705293 9.99109,-24.260749 -8.24441,2.537931 -14.08607,11.920807 -17.04582,17.834698 -1.1891,-7.022842 -1.14274,-16.90312 0.23245,-23.742098 -7.62915,4.471464 -11.71748,15.063897 -14.25625,20.846777 l -6.94357,-25.600368 -6.94355,25.600368 c -2.53878,-5.78288 -6.6271,-16.375313 -14.25625,-20.846777 1.37518,6.838978 1.42154,16.719256 0.23245,23.742098 -2.95976,-5.913891 -8.80141,-15.296767 -17.04582,-17.834698 2.53398,3.555456 6.84268,12.279735 9.99109,24.260749 z"
                                    style="fill:none;fill-opacity:1;stroke:#806600;stroke-width:0.37907794;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" />
                                </g>
                                <ellipse
                                    ry="20.478416"
                                    rx="76.137947"
                                    cy="-26.643051"
                                    cx="-361.8201"
                                    id="ellipse1058"
                                    style="fill:#fee46e;fill-opacity:1;stroke:#806600;stroke-width:0.96074188;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" />
                                <path
                                    style="fill:#e4c900;fill-opacity:1;stroke:none;stroke-width:0.96074188;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
                                    d="m -302.52618,1.4887639 10.15392,-24.1616929 c 4e-5,-0.166477 -0.13786,-3.404654 -4.22565,-5.63606 -3.0265,-1.965322 -8.10462,-4.076107 -14.6013,-5.823499 -12.9934,-3.49478 -31.76569,-5.614557 -50.62089,-5.614384 -18.85519,-1.73e-4 -37.62748,2.119604 -50.62088,5.614384 -6.49668,1.747392 -11.57481,3.858177 -14.6013,5.823499 -4.08777,2.231406 -4.22569,5.469588 -4.22566,5.63606 l 10.15393,24.1616929 z"
                                    id="path1065" />
                                <path
                                    style="fill:#fee46e;fill-opacity:1;stroke:none;stroke-width:0.96074188;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
                                    d="m -302.49365,-5.0230984 7.53638,-17.9360776 c -0.0469,-0.179418 -0.0976,-0.37683 -0.2324,-0.650884 -0.33993,-0.691348 -0.99273,-1.622906 -2.60174,-2.501209 -0.056,-0.03011 -0.11086,-0.06234 -0.16437,-0.09664 -2.64182,-1.71552 -7.56488,-3.804232 -13.89009,-5.505502 -12.6563,-3.404113 -31.30549,-5.528414 -49.97425,-5.528241 -18.66874,-1.73e-4 -37.31795,2.124128 -49.97424,5.528241 -6.32521,1.70127 -11.24828,3.789982 -13.89009,5.505502 -0.0535,0.0343 -0.1084,0.06653 -0.16438,0.09664 -1.60897,0.8783 -2.26179,1.809844 -2.60173,2.501209 -0.13481,0.27406 -0.18555,0.471457 -0.23239,0.650884 l 7.76226,18.4649878 c 28.43046,-13.4992388 83.70974,-14.9467748 118.42704,-0.5289102 z"
                                    id="path938" />
                                <path
                                    style="fill:#fff1a1;fill-opacity:1;stroke:none;stroke-width:0.96074188;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
                                    d="m -361.82325,-44.404209 c -19.74245,1.27e-4 -39.38288,2.207484 -53.13431,5.906264 -6.87571,1.849391 -12.30549,4.071426 -15.7351,6.298499 -3.42551,2.224407 -4.5518,4.19687 -4.55445,5.550981 0.007,0.783657 0.39523,1.721073 1.40007,2.870705 0.009,-0.04062 10e-4,-0.0521 0.0116,-0.09664 0.11768,-0.554314 0.3299,-1.262034 0.71419,-2.043602 0.76107,-1.547847 2.24992,-3.363384 4.72167,-4.732401 3.44529,-2.214087 8.63188,-4.324282 15.2533,-6.105225 13.3594,-3.593225 32.26566,-5.707481 51.32329,-5.707305 19.05765,-1.76e-4 37.9639,2.11408 51.3233,5.707305 6.62142,1.780943 11.80801,3.891138 15.2533,6.105225 2.47176,1.369015 3.96059,3.184543 4.72167,4.732401 0.38429,0.781573 0.59655,1.489278 0.71419,2.043602 0.0116,0.05502 0.004,0.07026 0.0145,0.119374 1.01298,-1.158366 1.39965,-2.098987 1.4029,-2.887759 v -0.0029 c -0.001,-1.354224 -1.13204,-3.327802 -4.56012,-5.553822 -3.42979,-2.227128 -8.85625,-4.449098 -15.73227,-6.2985 -13.75203,-3.698803 -33.39423,-5.906333 -53.13714,-5.906263 z"
                                    id="ellipse915" />
                                <path
                                    id="path931"
                                    d="m -302.52618,1.4887639 10.15392,-24.1616929 c 4e-5,-0.166477 -0.13786,-3.404654 -4.22565,-5.63606 -3.0265,-1.965322 -8.10462,-4.076107 -14.6013,-5.823499 -12.9934,-3.49478 -31.76569,-5.614557 -50.62089,-5.614384 -18.85519,-1.73e-4 -37.62748,2.119604 -50.62088,5.614384 -6.49668,1.747392 -11.57481,3.858177 -14.6013,5.823499 -4.08777,2.231406 -4.22569,5.469588 -4.22566,5.63606 l 10.15393,24.1616929 z"
                                    style="fill:none;fill-opacity:1;stroke:#806600;stroke-width:0.96074188;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" />
                                <g
                                    id="g936"
                                    transform="matrix(1.4510756,0,0,1.455249,381.8804,17.977244)"
                                    style="stroke-width:0.66113943;stroke-miterlimit:4;stroke-dasharray:none">
                                    <ellipse
                                    ry="12.144042"
                                    rx="45.280926"
                                    cy="-7.5053363"
                                    cx="-512.51672"
                                    id="path1035"
                                    style="fill:#fee46e;fill-opacity:1;stroke:#806600;stroke-width:0.66113943;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" />
                                    <path
                                    style="fill:#b9a300;fill-opacity:1;stroke:#806600;stroke-width:0.66113943;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
                                    d="m -512.51586,-14.455527 c -10.59777,-9.6e-5 -21.15487,1.192857 -28.40507,3.137321 -3.6251,0.972232 -6.43924,2.1480337 -8.0497,3.190828 -1.61046,1.042793 -1.60579,1.634138 -1.60583,1.359089 4e-5,-0.27505 -0.004,0.316296 1.60583,1.359089 1.61046,1.042794 4.4246,2.218596 8.0497,3.190828 7.2502,1.944464 17.8073,3.137418 28.40507,3.137321 10.59748,-2.1e-5 21.15352,-1.192874 28.40334,-3.137321 3.62492,-0.972223 6.43935,-2.148072 8.04971,-3.190828 1.61035,-1.042755 1.60578,-1.634131 1.60583,-1.359089 -5e-5,0.275042 0.004,-0.316333 -1.60583,-1.359089 -1.61036,-1.0427561 -4.42479,-2.218605 -8.04971,-3.190828 -7.24982,-1.944447 -17.80586,-3.137299 -28.40334,-3.137321 z"
                                    id="ellipse1050" />
                                    <path
                                    style="fill:#fff1a1;fill-opacity:1;stroke:none;stroke-width:0.66113943;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
                                    d="m -512.51834,-18.374943 c -11.71566,7.6e-5 -23.37077,1.33298 -31.53121,3.566476 -4.08023,1.116748 -7.30238,2.458516 -9.3376,3.803327 -2.03278,1.3431993 -2.70115,2.5342647 -2.70272,3.3519396 0.004,0.4732088 0.23455,1.0392642 0.83084,1.7334656 0.005,-0.024526 8.5e-4,-0.031459 0.007,-0.058358 0.0699,-0.3347209 0.19578,-0.7620748 0.42382,-1.2340218 0.45164,-0.9346625 1.33516,-2.0309672 2.80197,-2.8576444 2.04451,-1.336968 5.12235,-2.611202 9.05166,-3.686618 7.9278,-2.169756 19.14725,-3.446441 30.45651,-3.446335 11.30928,-1.06e-4 22.5287,1.276579 30.4565,3.446335 3.92932,1.075416 7.00718,2.34965 9.05169,3.686618 1.46681,0.8266761 2.35031,1.9229757 2.80196,2.8576444 0.22804,0.4719496 0.354,0.8992947 0.42382,1.2340218 0.007,0.033226 0.003,0.042426 0.008,0.072084 0.60113,-0.6994756 0.8306,-1.267466 0.83252,-1.7437635 v -0.00176 c -6.4e-4,-0.8177435 -0.67178,-2.0094816 -2.70608,-3.3536567 -2.03533,-1.344843 -5.25552,-2.686572 -9.33592,-3.803326 -8.1608,-2.23351 -19.81695,-3.56652 -31.53289,-3.566477 z"
                                    id="path929" />
                                </g>
                                <path
                                    style="fill:#fff1a1;fill-opacity:1;stroke:none;stroke-width:0.96074188;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
                                    d="m -346.86298,-36.988692 -2.44019,21.928217 c 9.40599,0.385845 18.77207,1.435618 27.63845,3.186195 l 2.47987,-22.297709 c -8.28262,-1.418134 -17.80435,-2.393674 -27.67813,-2.816703 z m -41.08075,1.622943 c -6.04221,0.763184 -11.62451,1.738235 -16.51164,2.890602 l 4.00462,22.25224 c 5.1477,-1.336486 10.67139,-2.420093 16.45213,-3.228834 z"
                                    id="rect946" />
                                </g>
                            </g>
                            </svg>
                        </div>
                    @endif
            </div>
            <div class="grid grid-cols-2 gap-1 ">
                <button class=" border-2 rounded-b-md bg-blue-500 hover:bg-opacity-50">
                    <a class="" id="Button1" type="button" value="Click" onclick="profilo();">Profilo</a>
                </button>
                <button class="border-2 rounded-b-md bg-blue-500 hover:bg-opacity-50">
                    <a class="ml-10" id="Button1" type="button" value="Click" onclick="impostazioni();">Impostazioni</a>
                </button>
            </div>

            <div class="flex items-center p-4 " id="Div1">
                <div class="relative flex flex-col items-center w-full">
                    <div class="h-24 w-24 md rounded-full relative avatar items-end justify-end text-purple-400 min-w-max absolute -top-16 flex bg-purple-200 text-purple-100 row-start-1 row-end-3 text-purple-650 ring-1 ring-white">
                        <img class="h-24 w-24 md rounded-full relative" src="data:image/png;base64,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" alt="">
                        <div class="absolute">

                        </div>
                    </div>
                    <div class="flex flex-col space-y-1 justify-center items-center -mt-12 w-full">
                        <span class="text-lg whitespace-nowrap text-gray-50 font-semibold ">{{ Auth::user()->name }}</span><span class="text-lg whitespace-nowrap text-gray-100">{{ Auth::user()->surname }}</span>
                        <p class="text-sm text-gray-200">
                            <span class="text-md">{{ Auth::user()->email }}</span>
                            <div class="inline-flex text-sm">
                                CF:&nbsp;
                                <div class="cf">
                                    <span class=" text-blue-300">{{ Auth::user()->cf }}</span>
                                </div>
                                <div class="ml-1" style="margin-top:1.5%;">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                    </svg>
                                </div>
                            </div>
                            <p class="text-xs text-gray-400">Creato il {{ Auth::user()->created_at }}</p>
                            <p class="text-xs text-gray-400">Ultima modifica il {{ Auth::user()->updated_at }}</p>
                    </div>
                    <div
                        class="py-4 flex justify-center items-center w-full divide-x divide-gray-400 divide-solid">
                        <a href="/mycorsi"class="text-center px-2">
                            <span class=" text-gray-50">
                                {{$count}}
                            </span>
                            <span class="font-bold text-gray-100">
                                 corsi
                            </span>
                        </a>
                        <span class="text-center px-2">
                            <span class=" text-gray-100">
                                <a href="/abbonamenti">abbonato?</a>
                            </span>
                            <span class="font-bold text-gray-50">
                                @if ($abbon != '[]')
                                    SI
                                @else
                                    NO
                                @endif
                            </span>
                        </span>
                    </div>
                    @if (session('fatto'))
                        <div id="chiudi" class="relative z-30 w-full">
                            <p class="text-green-500 bg-green-700 rounded-lg text-center p-1 m-3">
                                {{ session('fatto') }}
                                <svg xmlns="http://www.w3.org/2000/svg" class="animate-bounce h-6 w-6 inline-flex" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <button class="float-right mr-4" onclick="myFunction()">X</button>
                            </p>
                        </div>
                    @endif
                </div>

            </div>


            <div class="flex items-center p-4 " id="Div2" style="display: none">
                <div class="relative flex flex-col items-center w-full ">
                    <div class="h-24 w-24 md rounded-full avatar items-end justify-end text-purple-400 min-w-max absolute -top-16 flex bg-purple-200 row-start-1 row-end-3 text-purple-650 ring-1 ring-white">
                        <img class="h-24 w-24 md rounded-full relative" src="data:image/png;base64,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" alt="">
                        <div class="absolute"></div>
                    </div>sss
                        <form class="bg-blue text-center w-full px-3text-white mx-auto rounded" action="/edit" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{Auth::user()->id}}">
                            Nome:
                            <span class="text-lg whitespace-nowrap font-semibold text-black">
                                <input class="rounded block w-full mx-auto text-sm px-3 text-center" type="text" name="name" value="{{Auth::user()->name}}"><br />
                            </span>
                            Cognome:
                            <span class="text-lg whitespace-nowrap text-black">
                                <input class="rounded block w-full mx-auto text-sm px-3 text-center" type="text" name="surname" value="{{Auth::user()->surname}}"><br />
                            </span>
                            <p class="text-sm text-gray-200">
                                <div class="inline-flex text-sm ">

                                    <div class="w-full">
                                        CF:&nbsp;
                                        <span class=" text-black">
                                            <input class="rounded block w-full mx-auto text-sm px-3 text-center" type="text" name="cf" value="{{Auth::user()->cf}}"><br />
                                        </span>
                                        <button class="button bg-blue-500 hover:bg-blue-600 inline-block" type="submit">Cambia</button>
                                    </div>
                                </div>
                        </form>
                </div>
            </div>


        </div>
    </div>
    <script>
        function profilo() {
            if (document.getElementById('Div1')) {

                if (document.getElementById('Div1').style.display == 'none') {
                    document.getElementById('Div1').style.display = 'block';
                    document.getElementById('Div2').style.display = 'none';
                }
            }
        }

        function impostazioni() {
            if (document.getElementById('Div2')) {

                if (document.getElementById('Div2').style.display == 'none') {
                    document.getElementById('Div2').style.display = 'block';
                    document.getElementById('Div1').style.display = 'none';
                }
            }
        }
    </script>
@endsection
