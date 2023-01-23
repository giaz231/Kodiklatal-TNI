@extends('layout.main')
@section('content')
<!-- Main content -->
@php
$timezone = new DateTimeZone('Asia/Jakarta');
$date = new DateTime();
$date->setTimeZone($timezone);

$idCounterOdd = -1;
$idCounterEven = 0;
$hostname= "api.panicnitro.me";
$ip = gethostbyname($hostname);
$hostname2= "api.arvinbrowser.com";
$ip2 = gethostbyname($hostname2);
//exec("ping -n 3 $ip", $output, $status);
$timezone = new DateTimeZone('Asia/Jakarta');
$date = new DateTime();
$date->setTimeZone($timezone);
@endphp
@php
$cbin=0;
@endphp
@if(!Auth::guest())

<div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-default border-bottom">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav align-items-center  ml-md-auto ">
                    <li class="nav-item d-xl-none">
                        <!-- Sidenav toggler -->
                        <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </div>
                    </li>

                </ul>
                <h5 class="h2 text-white d-inline-block mb-0 ml-3"> Persuratan Kodiklatal Pusdiklek</h5>
                <ul class="navbar-nav align-items-center  ml-md-auto ">
                </ul>
                <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">

                                <div class="media-body  ml-2  d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold">@if (!Auth::guest())
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
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url('https://wallpapercave.com/wp/wp6621697.jpg'); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-12 col-md-10">
                    <h1 class="display-3 text-white">Formulir Pengiriman Disposisi</h1>
                    <p class="text-white mt-0 mb-5">Di sini Anda bisa mengirim beragam jenis Disposisi ke pejabat
                        lainnya dengan mudah</p>
                    <a href="{{route('disposisi_keluar')}}" class="btn btn-neutral">Lihat seluruh Disposisi</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <form action="{{ route('kirimreportdisposisi') }}" autocomplete="off" method="POST" enctype="multipart/form-data">
            <div class="row">
                <!-- <div class="col-xl-4 order-xl-2">
                    <div class="card card-profile"> -->
                <!-- <img src="{{ URL::asset('/img/theme/img-1-1000x600.jpg')}}" alt="Image placeholder"
                            class="card-img-top"> -->



                <!-- <div class="col-lg-12">
                                      
                                    </div> -->


                <!-- </div>
                </div> -->
                <div class="col-xl-12 order-xl-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                            </div>


                            <div class="row align-items-start">
                                <div class="col-8">
                                    @csrf
                                    <input type="hidden" name="type" value="a">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <h3 class="mb-0">Formulir Pengiriman Disposisi</h3>
                                            </div>
                                            <div class="col-4 text-right">
                                                <button type="submit" class="btn btn-md btn-primary">Kirim
                                                    Disposisi</button>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($message = Session::get('submit-fail'))
                                    <div class="alert alert-danger mt-3 mb-3" role="alert">
                                        <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
                                        <span class="alert-text"><strong>Error!</strong> {{ $message }}</span>
                                    </div>
                                    @elseif ($message = Session::get('submit-success'))
                                    <div class="alert alert-primary mt-3 mb-3" role="alert">
                                        <span class="alert-icon"><i class="ni ni-check-bold"></i></span>
                                        <span class="alert-text"><strong>Success!</strong> {{ $message }}</span>
                                    </div>
                                    @endif
                                    <div class="pl-lg-4 mt-3">
                                        <div class="row">
                                            <div class="col-lg-4 d-none">
                                                <div class="form-group">
                                                    <label class="form-control-label">Nama Pengirim</label>
                                                    <input type="text" class="form-control" readonly name="nama_pengirim" placeholder="Nama Pengirim" value="{{Auth::user()->name}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Terima Dari</label>
                                                    <input type="text" class="form-control" name="terima_dari" placeholder="Terima Dari" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group ml-4">
                                                    <label class="form-control-label">Nomor</label>
                                                    <input type="text" class="form-control" name="nomor" placeholder="Masukan nomor surat" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Tanggal</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                        </div>

                                                        <input class="form-control datepicker" type="text" placeholder="Contoh: 2021/12/06" name="tanggal" required>
                                                        <!-- value="{{date('j F, Y', strtotime($date->format('Y-m-d')))}} -->
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Perihal</label>
                                                    <textarea rows="0" class="form-control" name="perihal_surat" placeholder="Deskripsi isi disposisi oleh pengirim" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 border">
                                    <h1 class="text-center">AGENDA SETUM </h1>
                                    <div class="col-lg-12 " style="margin-top: 5%;">
                                        <div class="form-group ">
                                            <label class="form-control-label ">No.</label>
                                            <input type="text" class="form-control" autocomplete="off" name="nomor_agenda" placeholder="Isi hanya dengan angka" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Tanggal</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>

                                                <input class="form-control datepicker" type="text" placeholder="Contoh: 2021/12/06" name="tanggal_2" required>
                                                <!-- value="{{date('j F, Y', strtotime($date->format('Y-m-d')))}} -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />
                            <div class="row align-items-start">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">DITERUSKAN KEPADA : </label>
                                        <textarea rows="6" type="text" class="form-control" autocomplete="off" name="diteruskan" placeholder="Diteruskan Kepada" required></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="row border pt-3 pb-3 pl-3 pr-3">
                                        <div class="col-lg-4 ">
                                            <h4> Menggetahui </h4>
                                            <div class="form-group">
                                                <h6 class="form-control-label  mt-4 pt-1">Kasetum</h6>
                                                <h6 class="form-control-label  mt-4 pt-1">Kasubbagminu</h6>
                                                <h6 class="form-control-label  mt-4 pt-1">Kaur TU</h6>
                                            </div>

                                        </div>
                                        <div class="col-lg-4 ">
                                            <h4> Menggetahui </h4>
                                            <div class="form-group">
                                                <input type="text" class="form-control mt-2" autocomplete="off" name="kasetum" placeholder="" required>
                                                <input type="text" class="form-control mt-2" autocomplete="off" name="Kasubbagminu" placeholder="" placeholder="" required>
                                                <input type="text" class="form-control mt-2" autocomplete="off" name="kaur_tu" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 ">
                                            <h4> Kembali </h4>
                                            <div class="form-group">
                                                <input type="text" class="form-control mt-2" autocomplete="off" name="kasetum_kembali" placeholder="" required>
                                                <input type="text" class="form-control mt-2" autocomplete="off" name="Kasubbagminu_kembali" placeholder="" required>
                                                <input type="text" class="form-control mt-2" autocomplete="off" name="kaur_tu_kembali" placeholder="" required>
                                            </div>

                                        </div>
                                    </div>
                                </div>



                            </div>

                            <div class="">
                                <hr />
                                <h3 style="margin-left:35%;">Alamat Aksi </h3>
                                <hr />
                                @foreach($users as $user)
                                @if($user->id!=Auth::user()->id)


                                <!-- <div class="form-check form-check-inline" style="width:400px;">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="id_tujuan[]"  value="{{$user->id}}" >
  <label class="form-check-label" for="inlineCheckbox1" >{{$user->name}}</label>
</div> -->

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input text-danger" id="customCheck{{++$cbin}}" name="id_tujuan[]" value="{{$user->id}}"> <label class="custom-control-label" for="customCheck{{$cbin}}">{{$user->name}}</label>

                                </div>
                                @endif
                                @endforeach



                            </div>

                            <div class="">
                                <hr />
                                <h3 style="margin-left:35%;">Aksi </h3>
                                <hr />

                                <div class="row align-items-start">
                                    <div class="col-4">

                                        <tr>
                                            <th scope="row">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input text-danger" id="customCheck{{++$cbin}}" name="id_aksi[]" value="1"> <label class="custom-control-label" for="customCheck{{$cbin}}">TIPAKYIUM/AKSI</label>

                                                </div>

                                            </th>

                                        <tr>
                                            <th scope="row">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input text-danger" id="customCheck{{++$cbin}}" name="id_aksi[]" value="2"> <label class="custom-control-label" for="customCheck{{$cbin}}">PELAJAR/ PERMOHONAN TSB</label>

                                                </div>

                                            </th>
                                            <th scope="row">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input text-danger" id="customCheck{{++$cbin}}" name="id_aksi[]" value="3"> <label class="custom-control-label" for="customCheck{{$cbin}}"> SIAPKAN/AGENDAKAN/RAPATKAN</label>

                                                </div>

                                            </th>
                                            <th scope="row">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input text-danger" id="customCheck{{++$cbin}}" name="id_aksi[]" value="4"> <label class="custom-control-label" for="customCheck{{$cbin}}"> MONITOR/LAPORKAN</label>

                                                </div>

                                            </th>
                                            <th scope="row">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input text-danger" id="customCheck{{++$cbin}}" name="id_aksi[]" value="5"> <label class="custom-control-label" for="customCheck{{$cbin}}"> FOORD & TINDAK LANJUTI</label>

                                                </div>

                                            </th>
                                            <th scope="row">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input text-danger" id="customCheck{{++$cbin}}" name="id_aksi[]" value="6"> <label class="custom-control-label" for="customCheck{{$cbin}}">PELAJARI & DUKGAT TSB</label>

                                                </div>

                                            </th>

                                            </th>



                                            <!-- <div class="form-check">
                                            <input class="form-check-input" type="radio" name="id_aksi"
                                                id="exampleRadios1" value="1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                TIPAKYIUM/AKSI
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="id_aksi"
                                                id="exampleRadios2" value="2">
                                            <label class="form-check-label" for="exampleRadios2">
                                                PELAJAR/ PERMOHONAN TSB
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="id_aksi"
                                                id="exampleRadios2" value="3">
                                            <label class="form-check-label" for="exampleRadios2">
                                                SIAPKAN/AGENDAKAN/RAPATKAN
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="id_aksi"
                                                id="exampleRadios2" value="4">
                                            <label class="form-check-label" for="exampleRadios2">
                                                MONITOR/LAPORKAN
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="id_aksi"
                                                id="exampleRadios2" value="5">
                                            <label class="form-check-label" for="exampleRadios2">
                                                FOORD & TINDAK LANJUTI
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="id_aksi"
                                                id="exampleRadios2" value="6">
                                            <label class="form-check-label" for="exampleRadios2">
                                                PELAJARI & DUKGAT TSB
                                            </label>
                                        </div> -->


                                    </div>
                                    <div class="col">



                                        <th scope="row">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input text-danger" id="customCheck{{++$cbin}}" name="id_aksi[]" value="7"> <label class="custom-control-label" for="customCheck{{$cbin}}">SEBAGAI BAHAN REFF</label>

                                            </div>

                                        </th>

                                        </th>
                                        <th scope="row">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input text-danger" id="customCheck{{++$cbin}}" name="id_aksi[]" value="8"> <label class="custom-control-label" for="customCheck{{$cbin}}">KORDINASIKAN</label>

                                            </div>

                                        </th>

                                        </th>
                                        <th scope="row">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input text-danger" id="customCheck{{++$cbin}}" name="id_aksi[]" value="9"> <label class="custom-control-label" for="customCheck{{$cbin}}"> PELAJARI/AJUKAN SARAN/TANGGAPAN</label>

                                            </div>

                                        </th>

                                        </th>
                                        <th scope="row">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input text-danger" id="customCheck{{++$cbin}}" name="id_aksi[]" value="10"> <label class="custom-control-label" for="customCheck{{$cbin}}"> PROSES LANJUT, AKSI SYARMIN</label>

                                            </div>

                                        </th>

                                        </th>
                                        <th scope="row">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input text-danger" id="customCheck{{++$cbin}}" name="id_aksi[]" value="11"> <label class="custom-control-label" for="customCheck{{$cbin}}"> BUAT JAWABAN/TANGGAPAN</label>

                                            </div>

                                        </th>

                                        </th>
                                        <th scope="row">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input text-danger" id="customCheck{{++$cbin}}" name="id_aksi[]" value="12"> <label class="custom-control-label" for="customCheck{{$cbin}}"> CATAT/MONITOR PERKEMBANGANYA</label>

                                            </div>

                                        </th>

                                        </th>


                                        <!-- <div class="form-check">
                                            <input class="form-check-input" type="radio" name="id_aksi"
                                                id="exampleRadios2" value="7">
                                            <label class="form-check-label" for="exampleRadios2">
                                                SEBAGAI BAHAN REFF
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="id_aksi"
                                                id="exampleRadios2" value="8">
                                            <label class="form-check-label" for="exampleRadios2">
                                                KORDINASIKAN
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="id_aksi"
                                                id="exampleRadios1" value="9" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                PELAJARI/AJUKAN SARAN/TANGGAPAN
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="id_aksi"
                                                id="exampleRadios2" value="10">
                                            <label class="form-check-label" for="exampleRadios2">
                                                PROSES LANJUT, AKSI SYARMIN
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="id_aksi"
                                                id="exampleRadios2" value="11">
                                            <label class="form-check-label" for="exampleRadios2">
                                                BUAT JAWABAN/TANGGAPAN
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="id_aksi"
                                                id="exampleRadios2" value="12">
                                            <label class="form-check-label" for="exampleRadios2">
                                                CATAT/MONITOR PERKEMBANGANYA
                                            </label>
                                        </div> -->


                                    </div>
                                    <div class="col">

                                        <th scope="row">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input text-danger" id="customCheck{{++$cbin}}" name="id_aksi[]" value="13"> <label class="custom-control-label" for="customCheck{{$cbin}}">FILE/ARSIPKAN</label>

                                            </div>

                                        </th>

                                        </th>
                                        <th scope="row">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input text-danger" id="customCheck{{++$cbin}}" name="id_aksi[]" value="14"> <label class="custom-control-label" for="customCheck{{$cbin}}"> WAKILI</label>

                                            </div>

                                        </th>

                                        </th>
                                        <th scope="row">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input text-danger" id="customCheck{{++$cbin}}" name="id_aksi[]" value="15"> <label class="custom-control-label" for="customCheck{{$cbin}}"> HADIR</label>

                                            </div>

                                        </th>

                                        </th>
                                        <th scope="row">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input text-danger" id="customCheck{{++$cbin}}" name="id_aksi[]" value="16"> <label class="custom-control-label" for="customCheck{{$cbin}}"> UDK</label>

                                            </div>

                                        </th>

                                        </th>
                                        <th scope="row">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input text-danger" id="customCheck{{++$cbin}}" name="id_aksi[]" value="17"> <label class="custom-control-label" for="customCheck{{$cbin}}"> UMP</label>

                                            </div>

                                        </th>

                                        </th>
                                        <th scope="row">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input text-danger" id="customCheck{{++$cbin}}" name="id_aksi[]" value="18"> <label class="custom-control-label" for="customCheck{{$cbin}}"> ACC/DUKUNG</label>

                                            </div>

                                        </th>

                                        </th>
                                        <!-- <div class="form-check">
                                            <input class="form-check-input" type="radio" name="id_aksi"
                                                id="exampleRadios2" value="13">
                                            <label class="form-check-label" for="exampleRadios2">
                                                FILE/ARSIPKAN
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="id_aksi"
                                                id="exampleRadios2" value="14">
                                            <label class="form-check-label" for="exampleRadios2">
                                                WAKILI
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="id_aksi"
                                                id="exampleRadios2" value="15">
                                            <label class="form-check-label" for="exampleRadios2">
                                                HADIR
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="id_aksi"
                                                id="exampleRadios2" value="16">
                                            <label class="form-check-label" for="exampleRadios2">
                                                UDK
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="id_aksi"
                                                id="exampleRadios2" value="17">
                                            <label class="form-check-label" for="exampleRadios2">
                                                UMP
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="id_aksi"
                                                id="exampleRadios2" value="18">
                                            <label class="form-check-label" for="exampleRadios2">
                                                ACC/DUKUNG
                                            </label>
                                        </div> -->


                                    </div>

                                </div>
                                <hr />
                            </div>

                            <div class="row">
                                <div class="col-lg-4 mt-5">
                                    <!-- <div class="form-group">
                                            <label class="form-control-label">AKSI</label>
                                            <select class="custom-select mr-sm-2" name="id_aksi"
                                                id="inlineFormCustomSelect" required>
                                                <option value="">Pilih Jenis...</option>
                                                <option size="6" value="1">TIPAKYIUM/AKSI</option>
                                                <option size="6" value="2">PELAJAR/ PERMOHONAN TSB</option>
                                                <option size="6" value="3">SIAPKAN/AGENDAKAN/RAPATKAN</option>
                                                <option size="6" value="4">MONITOR/LAPORKAN</option>
                                                <option size="6" value="5">FOORD & TINDAK LANJUTI</option>
                                                <option size="6" value="6">PELAJARI & DUKGAT TSB</option>
                                                <option size="6" value="7">SEBAGAI BAHAN REFF</option>
                                                <option size="6" value="8">KORDINASIKAN</option>
                                                <option size="6" value="9">PELAJARI/AJUKAN SARAN/TANGGAPAN</option>
                                                <option size="6" value="10">PROSES LANJUT, AKSI SYARMIN</option>
                                                <option size="6" value="11">BUAT JAWABAN/TANGGAPAN</option>
                                                <option size="6" value="12">CATAT/MONITOR PERKEMBANGANYA</option>
                                                <option size="6" value="13">FILE/ARSIPKAN</option>
                                                <option size="6" value="14">WAKILI</option>
                                                <option size="6" value="15">HADIR</option>
                                                <option size="6" value="16">UDK</option>
                                                <option size="6" value="17">UMP</option>
                                                <option size="6" value="18">ACC/DUKUNG</option>

                                            </select>

                                        </div> -->






                                </div>
                            </div>
                        </div>



                        <div class="col-lg-12">


                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Disposisi / Catatan</label>
                                        <textarea rows="6" class="form-control" name="disposisi_catatan" placeholder="Kosongkan jika tidak perlu" required></textarea>

                                    </div>
                                </div>

                                <!-- <div class="col-lg-4">
                    <div class="form-group">
                      <div class="form-control-label">
                        <label>File Surat</label>
                      </div>
                      <label for="formFile" id="labelcust" class="btn btn-danger">Unggah File</label>
                    </div>
                    <input class="form-control" style="display:none;" type="file" name="file_surat" id="formFile">
                  </div> -->
                            </div>

                            <!-- Description -->
                        </div>
                    </div>
                </div>


                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-1">
                            <div class="form-group" style="padding-top: 10px;">
                                <!-- <strong>000</strong> -->
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">

                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">

                                <div class="custom-control custom-radio">

                                </div>
                                <div class="custom-control custom-radio">

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
    </div>


    </form>
</div>
</div>
<script type="text/javascript">
    $("#formFile").change(function() {
        filename = this.files[0].name;
        //$('ajsdbajsbdjsabd').text($(this).val());
        $('#labelcust').text('File terpilih: ' + filename);
        console.log(filename);
    });
    // $("#formFile").change(function() {
    //   filename = this.files[0].name
    //   console.log(filename);
    //   $("#label_file").text($(filename).val());
    // });
</script>


@else
<div class="main-content" id="panel">
    <div class="container-fluid">
        <div class="container">
            <h5 class="text-center" style="margin-top: 450px; margin-bottom: 450px;">You have to <a class="text-primary" href="{{route('login')}}"> <strong>sign in </strong></a> first! </h5>
        </div>
        @endif
        @endsection