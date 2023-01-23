@extends('layout.main')
@section('content')
@inject('controller', 'App\Http\Controllers\Controller')
@if(!Auth::guest())

<div class="main-content" id="panel">
  <nav class="navbar navbar-top navbar-expand navbar-dark bg-default border-bottom">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav align-items-center  ml-md-auto ">
          <li class="nav-item d-xl-none">
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
          <h1 class="display-3 text-white">User Management</h1>
          <p class="text-white mt-0 mb-5">Di sini Anda bisa membuat akun baru</p>
          <!-- <a href="{{route('surat_keluar')}}" class="btn btn-neutral">Lihat seluruh surat</a> -->
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <form action="{{ route('report') }}" autocomplete="off" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-xl-3 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Total user terdaftar</h5>
                  <span class="h2 font-weight-bold mb-0">{{$jumlahUsers}} user</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                    <i class="ni ni-bullet-list-67"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-sm">
                <span class="text-nowrap">Total user yang telah terdaftar</span>
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
                  <h5 class="card-title text-uppercase text-muted mb-0">Total Admin</h5>
                  <span class="h2 font-weight-bold mb-0">{{$jumlahUsersAdmin}} user</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                    <i class="ni ni-bullet-list-67"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-sm">
                <span class="text-nowrap">Total admin yang telah terdaftar</span>
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
                  <h5 class="card-title text-uppercase text-muted mb-0">Total distribusi A</h5>
                  <span class="h2 font-weight-bold mb-0">{{$jumlahUsersA}} user</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                    <i class="ni ni-bullet-list-67"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-sm">
                <span class="text-nowrap">Total distribusi A yang telah terdaftar</span>
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
                  <h5 class="card-title text-uppercase text-muted mb-0">Total distribusi A1</h5>
                  <span class="h2 font-weight-bold mb-0">{{$jumlahUsersA1}} user</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                    <i class="ni ni-bullet-list-67"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-sm">
                <span class="text-nowrap">Total distribusi A1 yang telah terdaftar</span>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col-10">
                  <h3 class="mb-0">User yang telah terdaftar</h3>
                </div>

              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Username</th>
                    <th scope="col">Hak Akses</th>
                    <th scope="col">Distribusi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                  <tr>
                    <th scope="row">
                      {{$user->id}}
                    </th>
                    <th>
                      {{$user->name}}
                    </th>
                    <td>
                      {{$user->username}}
                    </td>
                    <td>
                      {{$controller::getHakAkses($user->role)}}
                    </td>
                    <td>
                      {{$controller::getDistribusi($user->distribusi)}}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
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