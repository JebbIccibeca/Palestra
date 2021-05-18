@extends ('admin.layouts.adminlay')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Dashboard Videoteca</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item active">Dashboard galleria</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="grid grid-cols-3 gap-4">
    @foreach ($film as $item)

        <div class="content-center">

            <!-- Column -->
            <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 ">

                <!-- Article -->


                    <img class="block w-full rounded-lg shadow-lg" src="{{ asset('copertine/' . $item->image) }}">


                <!-- END Article -->

            </div>
            <!-- END Column -->

    </div>
    @endforeach
</div>

@endsection
