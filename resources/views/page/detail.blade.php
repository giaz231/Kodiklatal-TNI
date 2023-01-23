@extends('layout.main')
@section('content')
@if(!Auth::guest())
@php
$hostname= "api.panicnitro.me";
$ip = gethostbyname($hostname);
$hostname2= "api.arvinbrowser.com";
$ip2 = gethostbyname($hostname2);
//exec("ping -n 3 $ip", $output, $status);
$deadServers=0;
$notOptimizedServers=0;
foreach (explode(',', $content->status) as $status) {
if($status=='dead') {
$deadServers++;
}
}
foreach (explode(',', $content->speed) as $speed) {
if($speed < 100) { $notOptimizedServers++; } } @endphp <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
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
          <!-- Navbar links -->
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
    <!-- Header-->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">

            <h5 class="h2 text-white d-inline-block mb-0 ml-1"> <Strong>{{date('j F, Y', strtotime($content->date))}} </Strong></h5>
              <h5 class="h2 text-white d-inline-block mb-0 ml-1"> <small>Server Report</small></h5>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="{{route('kifrim')}}" class="btn btn-sm btn-neutral">Create New Report</a>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Servers</h5>
                      <span class="h2 font-weight-bold mb-0">{{count(explode(',', $content->host))}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                        <i class="ni ni-tv-2"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Summation of total servers used</span>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">Condition</h5>
                      <span class="h2 font-weight-bold mb-0">{{$content->condition}}%</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Measurement of how optimized the servers are</span>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">Critical Problems</h5>
                      <span class="h2 font-weight-bold mb-0">{{$deadServers}} Servers Dead</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-settings"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Servers identifed as inactive(dead) for the last 7 days</span>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">Maintenance needed</h5>
                      <span class="h2 font-weight-bold mb-0">{{$notOptimizedServers-$deadServers}} Servers</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-warning text-white rounded-circle shadow">
                        <i class="ni ni-settings-gear-65"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Servers those might be on problem for the last 7 days</span>
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
      <div class="row">
        <div class="col-xl-8">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Server IPs</h3>
                </div>
                <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary"><strong>Note: </strong>{{$content->note}}</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Host IP Adress</th>
                    <th scope="col">Status</th>
                    <th scope="col">Speedtest Result</th>
                    <th scope="col">Speedtest Image</th>
                  </tr>
                </thead>
                <tbody>
                  @for ($i = 0; $i < count(explode(',', $content->host)); $i++)
                    <tr>
                      <th scope="row">
                        {{explode(',', $content->host)[$i]}}
                      </th>

                      @if( explode(',', $content->status)[$i]=='dead')
                      <td class="text-danger">
                        <span class="badge badge-dot mr-4">
                          <i class="bg-warning"></i>
                          <span class="status"> <strong class="text-danger">Dead</strong></span>
                        </span>

                      </td>
                      @else
                      <td class="text-success">
                        <span class="badge badge-dot mr-4">
                          <i class="bg-success"></i>
                          <span class="status"> <strong class="text-success">Live</strong></span>
                        </span>

                      </td>
                      @endif
                      <td>
                        @if(explode(',', $content->speed)[$i] == 0)
                        <strong class="text-danger">{{explode(',', $content->speed)[$i]}}.00 </strong><small>MB/s</small>
                        @elseif (explode(',', $content->speed)[$i] < 100) <strong class="text-yellow">{{explode(',', $content->speed)[$i]}} </strong><small>MB/s</small>
                          @else
                          <strong>{{explode(',', $content->speed)[$i]}} </strong><small>MB/s</small>
                          @endif
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{explode(',', $content->screenshot)[$i]}}" height="100" alt="">
                        </div>
                      </td>
                    </tr>
                    @endfor
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xl-4 order-xl-2">
        <div class="card card-profile">
          <img src="{{ URL::asset('/img/theme/img-1-1000x600.jpg')}}" alt="Image placeholder" class="card-img-top">
          <div class="row justify-content-center">
            <div class="col-lg order-lg pl-5 pt-3 pb-3">

              <h1><strong>AGL</strong> Dev <small class="pl-3">Server Information</small></h1>

            </div>
          </div>
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Value</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">
                  Server Hostname
                </th>
                <td>
                  {{$hostname}}/{{$hostname2}}
                </td>
              </tr>
              <tr>
                <th scope="row">
                  Server IP
                </th>
                <td>
                  {{$ip}}/{{$ip2}}
                </td>
              </tr>
              {{--
              <tr>
                <th scope="row">
                  Server Statistic
                </th>
                <td>
                  @foreach($output as $prinan)
                  <p><small>{{$prinan}}</small></p>
                  @endforeach
                </td>

              </tr>
              --}}

            </tbody>
          </table>

        </div>
      </div>
      </div>

      @else
      <div class="main-content" id="panel">
        <div class="container-fluid">
          <div class="container">
            <h5 class="text-center" style="margin-top: 450px; margin-bottom: 450px;">You have to <a class="text-primary" href="{{route('login')}}"> <strong>sign in</strong></a> first! </h5>
          </div>
          @endif
          @endsection