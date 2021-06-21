@extends ('admin.layouts.adminlay')

@section('content')
@php
    if($array['ncorsifine']=='[]'){
        $array['ncorsifine']=0;
    }
@endphp
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard admin</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">


          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Vendite:</span>
                <span class="info-box-number">{{$array['nacquisti']}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Nuovi utenti:</span>
                <span class="info-box-number">{{$array['nuser']}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Accessi giornalieri</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="#" class="dropdown-item">Action</a>
                      <a href="#" class="dropdown-item">Another action</a>
                      <a href="#" class="dropdown-item">Something else here</a>
                      <a class="dropdown-divider"></a>
                      <a href="#" class="dropdown-item">Separated link</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong>Goal Completion</strong>
                    </p>

                    <div class="progress-group">
                      Corsi aggiunti al carrello
                      <span class="float-right"><b>{{$array['ncarrello']}}</b>/40</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: 15%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                      Acquisti completati
                      <span class="float-right"><b>{{$array['nacquisti']}}</b>/40</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width: 20%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Utenti abbonati</span>
                      <span class="float-right"><b>{{$array['nabbonati']}}</b>/40</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: 8%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Corsi al completo
                      <span class="float-right"><b>{{$array['ncorsifine']}}</b>/{{$array['ncorsi']}}</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" style="width: 50%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">

            <div class="row">

              <div class="col-md-6">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Ultimi membri</h3>

                    <div class="card-tools">
                      <span class="badge badge-danger">{{$array['nuser']}} nuovi utenti</span>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">

                        @foreach ($array['user'] as $item)
                        <li>
                            <img src="https://i.pinimg.com/originals/0c/3b/3a/0c3b3adb1a7530892e55ef36d3be6cb8.png" alt="User Image">
                            <a class="users-list-name" href="#">{{$item->name}}</a>
                        </li>
                        @endforeach

                        <span class="users-list-date">Ultimo aggiornamento: Oggi</span>

                    </ul>
                    <!-- /.users-list -->
                  </div>

                  <!-- /.card-body -->
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>
              <!-- /.col -->


              <div class="col-md-6">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Ultimi istruttori</h3>

                    <div class="card-tools">
                      <span class="badge badge-success">{{$array['nistruttori']}} nuovi istruttori</span>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">

                        @foreach ($array['istruttori'] as $item)
                        <li>
                            <img class="w-11/12" src="https://thumbs.dreamstime.com/z/insegnante-linea-icona-segno-di-vettore-del-profilo-pittogramma-lineare-dell-istruttore-di-stile-isolato-su-bianco-simbolo-del-92665319.jpg" alt="User Image">
                            <a class="users-list-name" href="#">{{$item->nome_istr}}</a>
                        </li>
                        @endforeach


                    </ul><span class="users-list-date">Ultimo aggiornamento: Oggi</span>
                    <!-- /.users-list -->
                  </div>

                  <!-- /.card-body -->
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>
            </div>
            <!-- /.row -->

            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Ultimi acquisti</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>ID acquisto</th>
                      <th>Nome</th>
                      <th>Stato</th>
                      <th>Utente</th>
                      <th>Scadenza:</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($array['acquisti'] as $item)
                    <tr>
                        <td><a href="pages/examples/invoice.html">{{$item->id_acqu}}</a></td>
                        <td>{{$item->nome}}</td>
                        <td><span class="badge badge-success">Acquistato</span></td>
                        <td>
                          <div class="sparkbar" data-color="#00a65a" data-height="20">{{$item->name}} {{$item->surname}}</div>
                        </td>
                        <td>
                            <div class="sparkbar" data-color="#00a65a" data-height="20">{{$item->scade}}</div>
                        </td>
                      </tr>
                    @endforeach

                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Inventario corsi</span>
                <span class="info-box-number">{{$array['ncorsi']}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
                <span class="info-box-icon"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Istruttori</span>
                <span class="info-box-number">{{$array['nistruttori']}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-info">
                <span class="info-box-icon"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Corsi aggiunti al carrello</span>
                <span class="info-box-number">{{$array['ncarrello']}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->

            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Ultimi corsi aggiunti</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  <!-- /.item -->

                  @foreach ($array['corsirecenti'] as $item)
                    <li class="item">
                        <div class="product-img">
                        <img src="{{ asset('copertine/' . $item->image) }}" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">{{$item->nome}}
                            <span class="badge badge-success float-right">{{$item->prezzo}}€</span></a>
                        <span class="product-description">
                            {{$item->descrizione}}
                        </span>
                        </div>
                    </li>
                  @endforeach

                  <!-- /.item -->
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="/eliminacorsi"  class="uppercase">Vedi tutti i corsi</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
@endsection
