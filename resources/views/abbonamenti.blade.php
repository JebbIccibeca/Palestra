@extends('layouts.dashboardlay')
@section('title','abbonamenti')
@section('content')

<main>

    <section class="pricing section">
        <div class="container-sm">
            <div class="pricing-inner section-inner">
                <div class="pricing-header text-center">
                    <h2 class="section-title mt-0">Abbonamento</h2>
                    <p class="section-paragraph mb-0">Abbonati per avere uno sconto del 20% sui nostri corsi.</p>
                </div>
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
                                @php
                                    use App\Models\abbonamento;

                                    if (Auth::check()) {
                                        $user = Auth::user()->id;
                                        $abbon = abbonamento::select('id_abbo')->where('abbonamenti.id_utente','=', $user)->get();
                                        $login = TRUE;
                                    }else{
                                        $login = NULL;
                                    }
                                @endphp
                                @if ($login == FALSE)
                                    <a class="button button-primary button-shadow button-block" href="/login">Compra ora</a>
                                @elseif ($login == TRUE)
                                    @if ($abbon != '[]')
                                    <a class="button button-primary button-shadow button-block cursor-not-allowed" href="#">Abbonamento già acquistato</a>
                                    @else
                                    <a class="button button-primary button-shadow button-block" href="/abbonati" >Compra ora</a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
