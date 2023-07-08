@extends('index')

@section('content')
    <div class="row justify-content-end">
        <form method="POST" action="{{ route('tagihan.report') }}">
        @csrf
            <div class="row">
                <div class="col-3"></div>
                <div class="col-2">
                    <input class="form-control" type="date" name="start" value="{{$startDate->format('Y-m-d')}}" id="example-month-input">
                </div>
                <div class="col-2">
                    <input class="form-control" type="date" name="end" value="{{$endDate->format('Y-m-d')}}" id="example-month-input">
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-block bg-light mb-3" data-bs-toggle="modal" data-bs-target="#modal-default">Filter Data</button>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Laporan Tagihan</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive">
                        <table id="tableTagihan" class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Tanggal</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Keterangan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        User</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Jumlah</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                        Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key =>$row)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2">
                                                <div class="my-auto">
                                                    <h6 class="mb-0 text-sm">{{$key+1}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{$row->tgl_tagihan}}</p>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold">{{$row->keterangan}}</span>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold">{{$row->user->name}}</span>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold">{{$row->jumlah}}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            @if ($row->status_tagihan == 0)
                                                <span class="me-2 text-xs font-weight-bold badge bg-gradient-danger">Belum Bayar</span>
                                            @elseif($row->status_tagihan == 1)
                                                <span class="me-2 text-xs font-weight-bold badge bg-gradient-info">Menunggu Konfirmasi</span>
                                            @else
                                                <span class="me-2 text-xs font-weight-bold badge bg-gradient-success">Lunas</span>
                                            @endif
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Tagihan Belum Bayar</p>
                        <div class="col-9">
                            <div class="numbers">
                                <h5 class="font-weight-bolder">
                                    Rp. {{ $totalBlmBayar }} / {{ $jmlhBlmBayar }} Tagihan
                                </h5>
                                {{-- <p class="mb-0">
                                    <span class="text-success text-sm font-weight-bolder">+5%</span> than last
                                    month
                                </p> --}}
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <div
                                class="icon icon-shape bg-gradient-secondary shadow-secondary text-center rounded-circle">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Tagihan Belum Terkonfirmasi</p>
                        <div class="col-9">
                            <div class="numbers">
                                <h5 class="font-weight-bolder">
                                    Rp. {{ $totalBlmKonfrim }} / {{ $jmlhBlmKonfrim }} Tagihan
                                </h5>
                                {{-- <p class="mb-0">
                                    <span class="text-success text-sm font-weight-bolder">+5%</span> than last
                                    month
                                </p> --}}
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <div
                                class="icon icon-shape bg-gradient-secondary shadow-secondary text-center rounded-circle">
                                <i class="fas fa-money-check"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Tagihan Terkonfirmasi</p>
                        <div class="col-9">
                            <div class="numbers">
                                <h5 class="font-weight-bolder">
                                    Rp. {{ $totalKonfrim }} / {{ $jmlhKonfrim }} Tagihan
                                </h5>
                                {{-- <p class="mb-0">
                                    <span class="text-success text-sm font-weight-bolder">+5%</span> than last
                                    month
                                </p> --}}
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <div
                                class="icon icon-shape bg-gradient-secondary shadow-secondary text-center rounded-circle">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    <script>
        $(".nav-link").removeClass("active")
        $("#nav-link-laporan-tagihan").addClass("active")

        $(document).ready(function() {
            $('#tableTagihan').DataTable();

            styleDatatable("tableTagihan")
        });
    </script>
@endpush
