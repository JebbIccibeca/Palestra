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

<div class="grid grid-cols-3 gap-4 ml-20">
    @foreach ($foto as $item)

        <div class="content-center">

            <!-- Column -->
            <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 ">

                <!-- Article -->

                <div class="w-64 h-64 relative rounded">
                    <img class="block w-full rounded-lg shadow-lg" src="{{ asset('copertine/' . $item->image) }}"/>
                    <div class="opacity-0 hover:opacity-100 duration-300 absolute inset-0 z-10 flex justify-center items-center text-md text-purple-700 font-semibold">{{$item['nome']}}</div>
                </div>


                <!-- END Article -->

            </div>

            <!-- END Column -->

    </div>
    @endforeach
</div>
@endsection
