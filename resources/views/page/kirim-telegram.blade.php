@extends('layout.main')
@section('content')
<!-- Main content -->
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
          <h1 class="display-3 text-white">Formulir Pengiriman Telegram</h1>
          <p class="text-white mt-0 mb-5">Di sini Anda bisa mengirim telegram ke pejabat lainnya dengan mudah</p>
          <a href="{{route('telegram_keluar')}}" class="btn btn-neutral">Lihat seluruh telegram</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <form action="{{ route('kirimreporttelegram') }}" autocomplete="off" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img src="{{ URL::asset('/img/theme/img-1-1000x600.jpg')}}" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg order-lg pl-5 pt-3 pb-3">
                <h1><strong>Dikirim Kepada</strong> <small class="pl-3"></small></h1>
              </div>
            </div>
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Nama pejabat <span style="font-weight: bold;"> A </span></th>

                </tr>
              </thead>
              @foreach($users as $user)
              @if($user->id!=Auth::user()->id)
              @if($user->distribusi==0)
              <tr>
                <th scope="row">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input text-danger" id="customCheck{{++$cbin}}" name="id_tujuan[]" value="{{$user->id}}"> <label class="custom-control-label" for="customCheck{{$cbin}}">{{$user->name}}</label>

                  </div>

                </th>

              </tr>
              @endif
              @endif
              @endforeach

              </tbody>
            </table>


            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Nama pejabat <span style="font-weight: bold;"> A1 </span></th>

                </tr>
              </thead>
              @foreach($users as $user)
              @if($user->id!=Auth::user()->id)
              @if($user->distribusi==1)


              <tr>
                <th scope="row">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input text-danger" id="customCheck{{++$cbin}}" name="id_tujuan[]" value="{{$user->id}}"> <label class="custom-control-label" for="customCheck{{$cbin}}">{{$user->name}}</label>

                  </div>

                </th>

              </tr>
              @endif
              @endif
              @endforeach

              </tbody>
            </table>

          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
              </div>



              @csrf
              <input type="hidden" name="type" value="a">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col-8">
                    <h3 class="mb-0">Formulir Pengiriman Telegram</h3>
                  </div>
                  <div class="col-4 text-right">
                    <button type="submit" class="btn btn-md btn-primary">Kirim Telegram</button>
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
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Nama Pengirim</label>
                      <input type="text" class="form-control " readonly name="nama_pengirim" placeholder="Nama Pengirim" value="{{Auth::user()->name}}">
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Unit Organisasi</label>
                      <select class="custom-select mr-sm-2" name="id_unit" id="inlineFormCustomSelect" required>
                        <option value="">Pilihan Unit...</option>
                        <option size="6" value="1">MABES TNI</option>
                        <option size="6" value="2">TNI AD</option>
                        <option size="6" value="3">TNI AL</option>
                        <option size="6" value="4">TNI AU</option>
                        <option size="6" value="5">POLRI</option>
                        <option size="6" value="6">KEMENTRIAN</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-lg-4">


                    <div class="form-group">
                    <label class="form-control-label">TWU</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                        </div>
                        
                        <input class="form-control datepicker" type="text" placeholder="Contoh: 2021/12/06" name="tanggal">
                    
                      </div>
                    </div>


                  </div>

                </div>
                <div class="row">
                  <div class="col-lg-4">
          
                    <div class="form-group">
                      <label class="form-control-label">Nomor Telegram</label>
                      <input type="text" class="form-control" name="nomor_surat" placeholder="Masukan nomor surat">
                    </div>

                  </div>

                  <div class="col-lg-8">
                    <div class="form-group">
                      <label class="form-control-label">Perihal Telegram</label>
                      <textarea rows="6" class="form-control" name="perihal_surat" placeholder="Deskripsi isi telegram oleh pengirim" required></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Nomor Agenda</label>
                      <input type="text" class="form-control" autocomplete="off" name="nomor_agenda" placeholder="Isi hanya dengan angka">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Kata Sandi</label>
                      <input type="password" autocomplete="off" class="form-control" name="password" placeholder="Kosongkan jika tidak perlu">
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <div class="form-group">
                      <div class="form-control-label">
                        <label>File Surat</label>
                      </div>
                      <label for="formFile" id="labelcust" class="btn btn-danger">Unggah File</label>
                    </div>
                    <input class="form-control" style="display:none;" type="file" name="file_surat" id="formFile">
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Description -->


                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Klasifikasi</label>
                      <input type="text" class="form-control " name="klasifikasi" placeholder="Klasifikasi">
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Derajat</label>
                      <input type="text" class="form-control " name="derajat" placeholder="Derajat">
                    </div>
                  </div>


                </div>
                <div>
                </div>
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
<script src="{{ URL::asset('/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
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