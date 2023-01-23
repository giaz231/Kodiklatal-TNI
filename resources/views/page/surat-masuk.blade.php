@extends('layout.main')
@section('content')
@if(!Auth::guest())
@inject('controller', 'App\Http\Controllers\DashboardController')

<div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Search form -->
                <ul class="navbar-nav align-items-center  ml-md-auto ">
                    <li class="nav-item d-xl-none">
                        <!-- Sidenav toggler -->
                        <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                            data-target="#sidenav-main">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </div>
                    </li>

                </ul>
                <h5 class="h2 text-white d-inline-block mb-0 ml-3"> Persuratan Kodiklatal Pusdiklek</h5>
                <!-- Navbar links -->
                <ul class="navbar-nav align-items-center  ml-md-auto ">

                </ul>
                <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <div class="media align-items-center">
                                <div class="media-body  ml-2  d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold"> @if (!Auth::guest())
                                        Selamat datang, {{Auth::user()->name}}
                                        @else
                                        Guest
                                        @endif</span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">

                        <h6 class="h2 text-white d-inline-block mb-0 ml-3"> Laporan Data Surat</h6>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{route('kirim_surat')}}" class="btn btn-sm btn-neutral">Kirim Surat</a>
                    </div>
                    
                </div>
                <!-- Card stats -->
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total surat diterima</h5>
                                        <span class="h2 font-weight-bold mb-0">{{$jumlahSuratDiterima}} surat</span>
                                    </div>
                                    <div class="col-auto">
                                        <div
                                            class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                                            <i class="ni ni-bullet-list-67"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-nowrap">Total surat yang telah diterima oleh pengguna</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total surat belum dibaca</h5>
                                        <span class="h2 font-weight-bold mb-0">{{$jumlahSuratBelumDibaca}} surat</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                                            <i class="ni ni-bullet-list-67"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-nowrap">Total surat yang belum dibaca oleh pengguna</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        @if ($message = Session::get('wrong-password'))
        <div class="alert alert-danger mt-3 mb-3" role="alert">
            <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
            <span class="alert-text"><strong>Error!</strong> {{ $message }}</span>
        </div>
        @endif
        <!--<div class="row">
      <div class="col-xl-8">
        <div class="card bg-default">
          <div class="card-header bg-transparent">
            <div class="row align-items-center">
              <div class="col">
                <h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6>
                <h5 class="h3 text-white mb-0">Sales value</h5>
              </div>

            </div>
          </div>
          <div class="card-body">
   
            <div class="chart">
            
              <canvas id="chart-sales-dark" class="chart-canvas"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4">
        <div class="card">
          <div class="card-header bg-transparent">
            <div class="row align-items-center">
              <div class="col">
                <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                <h5 class="h3 mb-0">Total orders</h5>
              </div>
            </div>
          </div>
          <div class="card-body">
          
            <div class="chart">
              <canvas id="chart-bars" class="chart-canvas"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>-->
        <div class="row">
            <div class="col-xl-12">
                        
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-10">
                                <h3 class="mb-0">Surat yang anda terima</h3>
                            </div>

                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">No Surat</th>
                                    <th scope="col">Tanggal Surat</th>
                                    <th scope="col">Pengirim Surat</th>
                                    <th scope="col">Jenis Surat</th>
                                    <th scope="col">Perihal</th>
                                    <th scope="col">DiBaca</th>
                                    <th scope="col">Dikirim Kepada</th>
                                    <th scope="col">FIle SUrat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($suratDiterimas as $surat)
                                <tr>
                                    <th scope="row">
                                        {{$surat->id}}
                                    </th>
                                    <th>
                                        {{$surat->no_surat}}
                                    </th>
                                    <td>
                                        {{date('j F, Y', strtotime($surat->tanggal))}}
                                    </td>
                                    <td>
                                        {{ $controller::getUserName($surat->id_pengirim)}}

                                    </td>
                                    <td>
                                        {{$controller::getJenisSurat($surat->id_jenis_surat)}}
                                    </td>
                                    <td>
                                        {{$surat->perihal_surat}}
                                    </td>
                                    <td>
                                        @if(in_array( Auth::user()->id ,explode(",",$surat->dibaca)))
                                        <span class="badge-dot mr-4">
                                            <i class="bg-success"></i>
                                            <span class="status">Sudah dibaca</span>
                                            @else
                                            <span class="badge-dot mr-4">
                                                <i class="bg-danger"></i>
                                                <span class="status">Belum dibaca</span>
                                                @endif
                                    </td>
                                    <td>
                                        @foreach (explode(',',$surat->id_tujuan) as $id)
                                        @if($loop->index!=0)
                                        ,
                                        @endif
                                        {{$controller::getUserName($id)}}

                                        @endforeach
                                    </td>
                                    <td>
                                        <i class="ni ni-single-copy-04  text-primary mr-2"></i>
                                        <a href="" id="modalShow" data-toggle="modal" data-arg="{{$surat->id}}" data-arg-dibaca="{{$surat->dibaca}}"
                                            data-target="#exampleModal"><strong>Lihat</strong></a>
                                    </td>
                        
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-10 text-right">

            </div>
            <div class="col-2 text-right">
                {{$suratDiterimas->links()}}
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Password Surat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('lihat_surat')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" name="password" placeholder="Password" type="password">
                                </div>
                            </div>
                            <input class="form-control" name="id_surat" id="idSurat" type="hidden">
                            <input class="form-control" name="dibaca" id="dibaca" type="hidden">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">Buka Surat</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <script type="text/javascript">
        $(document).on('click', '#modalShow', function(data) {
            var arg = $(this).attr('data-arg');
            $('input[name=id_surat]').val(arg);
            console.log(arg);
            var arg2 = $(this).attr('data-arg-dibaca');
                $('input[name=dibaca]').val(arg2);
                console.log(arg2);

        });
        </script>
        @else
        <div class="main-content" id="panel">
            <div class="container-fluid">
                <div class="container">
                    <h5 class="text-center" style="margin-top: 450px; margin-bottom: 450px;">You have to <a
                            class="text-primary" href="{{route('login')}}"> <strong>sign in</strong></a> first! </h5>
                </div>
                @endif
                @endsection