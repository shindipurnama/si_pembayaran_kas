<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header ">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html "
            target="_blank">
            <img src="{{ asset('/assets/img/logo-ct.png')}}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">SI - Pembayaran Kas</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto  h-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" id="nav-link-dashboard" href="{{route('home')}}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            @if (auth()->user()->role_id == 1)
            <li class="nav-item">
                <a class="nav-link" id="nav-link-role" href="{{route('role.index')}}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-briefcase-24 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Role</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="nav-link-user" href="{{route('user.index')}}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-circle-08 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">User</span>
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" id="nav-link-tagihan" href="{{route('tagihan.index')}}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-credit-card text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Tagihan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="nav-link-pembayaran" href="{{route('pembayaran.index')}}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-dollar-sign text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pembayaran</span>
                </a>
            </li>
            @if (auth()->user()->role_id == 1)
            <li class="nav-item">
                <a class="nav-link" id="nav-link-laporan-uang-masuk" href="{{route('pembayaran.create')}}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-file-invoice-dollar text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Laporan Pembayaran</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="nav-link-laporan-tagihan" href="{{route('tagihan.create')}}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-receipt text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Laporan Tagihan</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</aside>
