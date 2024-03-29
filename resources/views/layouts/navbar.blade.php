<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
    data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            </div>
            <ul class="navbar-nav justify-content-end">

                <li class="nav-item dropdown px-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bell cursor-pointer"></i>
                        @if(count($notifications) > 0)
                            <span class="badge bg-warning navbar-badge">{{ count($notifications) }}</span>
                        @endif
                    </a>

                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                        @if (auth()->user()->role_id == 1)
                            @forelse($notifications as $notification)
                                <li class="mb-2">
                                    <a class="dropdown-item active border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">New Pembayaran</span> <br> Tagihan No: {{ $notification->data['id_tagihan'] }}, Rp. {{ number_format($notification->data['total_bayar']) }}
                                        </h6>
                                        </div>
                                    </div>
                                    </a>
                                </li>
                                
                                @if($loop->last)
                                    <a href="#" id="mark-all">
                                        Mark all as read
                                    </a>
                                @endif
                            @empty
                                <span class="font-weight-bold">There are no new notifications</span>                            
                            @endforelse
                        @else
                            @forelse($notifications as $notification)
                                <li class="mb-2">
                                    <a class="dropdown-item active border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">{{ $notification->data['notifikasi'] ?? 'Baru'}}</span> {{ $notification->data['keterangan'] }} Rp. {{ number_format($notification->data['jumlah']) }}
                                        </h6>
                                        </div>
                                    </div>
                                    </a>
                                </li>
                                @if($loop->last)
                                    <a href="#" class="float-right" id="mark-all">
                                        Mark all as read
                                    </a>
                                @endif
                            @empty
                                <span class="font-weight-bold">There are no new notifications</span>                            
                            @endforelse
                        @endif
                    </ul>
                </li>
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user me-sm-1"></i>
                        <span class="d-sm-inline d-none">{{auth()->user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end me-sm-n4"
                        aria-labelledby="dropdownMenuButton">
                        <li>
                            <a class="dropdown-item border-radius-md" href="{{route('user.create')}}">
                                <div class="d-flex">
                                    <div class="my-auto">
                                        <i class="fas fa-user me-3" style="color: primary;"></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h5 class="text-sm font-weight-normal mb-1" style="color: primary;">
                                            <span class="font-weight-bold" style="color: primary;">Profile</span>
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();" class="dropdown-item border-radius-md">
                                    <div class="d-flex">
                                        <div class="my-auto">
                                            <i class="fas fa-power-off  me-3" style="color: red;"></i>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h5 class="text-sm font-weight-normal mb-1" style="color: red;">
                                                <span class="font-weight-bold" style="color: primary;">Logout</span>
                                            </h5>
                                        </div>
                                    </div>
                                </a>
                        </form>
                        </li>
                    </ul>
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                  <a href="javascript:;" class="nav-link text-black p-0" id="iconNavbarSidenav">
                    <div class="sidenav-toggler-inner">
                      <i class="sidenav-toggler-line bg-white"></i>
                      <i class="sidenav-toggler-line bg-white"></i>
                      <i class="sidenav-toggler-line bg-white"></i>
                    </div>
                  </a>
                </li>

            </ul>
        </div>
    </div>
</nav>


@section('scripts')
@push('script')    
    <script>
        window.onload = function() {
            // Make an Ajax GET request
            $.ajax({
                url: '{{ route('count.notifikasi') }}',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                }
            });
        }
        function sendMarkRequest(id = null) {
            return $.ajax("{{ route('markNotification') }}", {
                method: 'POST',
                data: {                    
                    "_token": "{{ csrf_token() }}",
                    "id" : id
                }
            });
        }

        $(function() {
            // $('.mark-as-read').click(function() {
            //     let request = sendMarkRequest($(this).data('id'));

            //     request.done(() => {
            //         $(this).parents('div.alert').remove();
            //     });
            // });

            $('#mark-all').click(function() {
                // console.log('inser')
                let request = sendMarkRequest();

                request.done(() => {
                    location.reload();
                })
            });
        });
    </script>
@endpush
@endsection