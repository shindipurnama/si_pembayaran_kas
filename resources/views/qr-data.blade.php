<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/assets/img/logo-ct.png')}}">
    <link rel="icon" type="image/png" href="{{ asset('/assets/img/logo-ct.png')}}">
    <title>
        SI - Pembayaran Kas
    </title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{ asset('/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('/assets/css/argon-dashboard.css?v=2.0.4')}}" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>

    <!-- Main Sidebar Container -->
    {{-- @include('layouts.sidebar') --}}


    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        {{-- @include('layouts.navbar') --}}

        <!-- Content -->
        <div class="container-fluid py-4">            
          <div class="card shadow-lg mx-4">
            <div class="card-body p-3">
              <div class="row gx-4">
                <div class="col-auto">
                  <div class="avatar avatar-xl position-relative">
                    <img src="{{ asset('/assets/img/team-1.jpg')}}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                  </div>
                </div>
                <div class="col-auto my-auto">
                  <div class="h-100">
                    <h5 class="mb-1">
                      {{ $user->name }}
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                      {{ $user->role->role }}
                    </p>
                  </div>
                </div>
                <div class="col-8" style="float:right" align="right">
                  <div class="avatar avatar-xl position-relative" style="float:right">
                    <img style="float:right" src="data:image/png;base64,{{DNS2D::getBarcodePNG(route('qr-data.show',$user->id), "QRCODE", 3,3)}}">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <form method="POST" action="{{ route('user.update',[auth()->id()]) }}">
            @csrf
            @method('PUT')
            <div class="container-fluid py-4">
                <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                        <p class="mb-0">Data User</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">User Information</p>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Name</label>
                            <input class="form-control" type="text" readonly name="name" value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Email address</label>
                            <input class="form-control" type="email" readonly name="email" value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Alamat</label>
                            <input class="form-control" type="text" readonly name="alamat" value="{{ $user->alamat }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="example-text-input" class="form-control-label">No Telepon</label>
                            <input class="form-control" type="text" readonly name="no_tlp" value="{{ $user->no_tlp }}">
                            </div>
                        </div>
                        </div>
                        <hr class="horizontal dark">
                    </div>
                    </div>
                </div>
                </div>
            </div>
          </form>

            @include('layouts.footer')
        </div>
    </main>

    @stack('script')
    <!--   Core JS Files   -->
    <script src="{{ asset('/assets/js/core/popper.min.js')}}"></script>
    <script src="{{ asset('/assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{ asset('/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ asset('/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('/assets/js/argon-dashboard.min.js?v=2.0.4')}}"></script>
    <script src="{{ asset('/assets/js/plugins/flatpickr.min.js')}}"></script>

    <script>
        function styleDatatable(id) {
            $(`#${id}_previous a`).html(`<span><i class="fas fa-chevron-left"></i></span>`)
            $(`#${id}_next a`).html(`<span><i class="fas fa-chevron-right"></i></span>`)
            $(`[name=${id}_length]`).css({'padding-right':'30px'})
            $(`#${id}_filter`).css({'justify-content':'end', 'display':'flex'})
            $(`#${id}_paginate .pagination`).css({'justify-content':'end', 'margin':'0px'})
            $(".dt-row").prev().css({'align-items':'center', 'padding':'10px 50px'})
            $(".dt-row").next().css({'align-items':'center', 'padding':'10px 50px'})
        }
    </script>
</body>

</html>

