@extends ('admin.layouts.adminlay')

@section('content')


<section class="content">
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
                <li class="breadcrumb-item active">Calendario</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid">
        <style>
            * {box-sizing: border-box;}
            ul {list-style-type: none;}
            body {font-family: Verdana, sans-serif;}

            .month {
              padding: 70px 25px;
              width: 100%;
              background: #1abc9c;
              text-align: center;
            }

            .month ul {
              margin: 0;
              padding: 0;
            }

            .month ul li {
              color: white;
              font-size: 20px;
              text-transform: uppercase;
              letter-spacing: 3px;
            }

            .month .prev {
              float: left;
              padding-top: 10px;
            }

            .month .next {
              float: right;
              padding-top: 10px;
            }

            .weekdays {
              margin: 0;
              padding: 10px 0;
              background-color: #ddd;
            }

            .weekdays li {
              display: inline-block;
              width: 13.6%;
              color: #666;
              text-align: center;
            }

            .days {
              padding: 10px 0;
              background: #eee;
              margin: 0;
            }

            .days li {
              list-style-type: none;
              display: inline-block;
              width: 13.6%;
              text-align: center;
              margin-bottom: 5px;
              font-size:12px;
              color: #777;
            }

            .days li .active {
              padding: 5px;
              background: #1abc9c;
              color: white !important
            }

            li>a:hover{
                color: white !important;
                padding: 5px;
                background: #1abc9c;
            }

            /* Add media queries for smaller screens */
            @media screen and (max-width:720px) {
              .weekdays li, .days li {width: 13.1%;}
            }

            @media screen and (max-width: 420px) {
              .weekdays li, .days li {width: 12.5%;}
              .days li .active {padding: 2px;}
            }

            @media screen and (max-width: 290px) {
              .weekdays li, .days li {width: 12.2%;}
            }
            </style>

            <div class="month">
              <ul>
                <li class="prev">&#10094;</li>
                <li class="next">&#10095;</li>
                <li>
                  Maggio<br>
                  <span style="font-size:18px">2021</span>
                </li>
              </ul>
            </div>

            <ul class="weekdays">
              <li><a href="#">Lun</a></li>
              <li><a href="#">Mar</a></li>
              <li><a href="#">Mer</a></li>
              <li><a href="#">Gio</a></li>
              <li><a href="#">Ven</a></li>
              <li><a href="#">Sab</a></li>
              <li><a href="#">Dom</a></li>
            </ul>

            <ul class="days">
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">6</a></li>
              <li><a href="#">7</a></li>
              <li><a href="#">8</a></li>
              <li><a href="#">9</a></li>
              <li><span class="active"><a href="#">10</a></span></li>
              <li><a href="#">11</a></li>
              <li><a href="#">12</a></li>
              <li><a href="#">13</a></li>
              <li><a href="#">14</a></li>
              <li><a href="#">15</a></li>
              <li><a href="#">16</a></li>
              <li><a href="#">17</a></li>
              <li><a href="#">18</a></li>
              <li><a href="#">19</a></li>
              <li><a href="#">20</a></li>
              <li><a href="#">21</a></li>
              <li><a href="#">22</a></li>
              <li><a href="#">23</a></li>
              <li><a href="#">24</a></li>
              <li><a href="#">25</a></li>
              <li><a href="#">26</a></li>
              <li><a href="#">27</a></li>
              <li><a href="#">28</a></li>
              <li><a href="#">29</a></li>
              <li><a href="#">30</a></li>
              <li><a href="#">31</a></li>
            </ul>
    </div>
</section>


@endsection
