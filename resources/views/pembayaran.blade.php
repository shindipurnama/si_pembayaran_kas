@extends('index')

@section('content')
    @if (auth()->user()->role_id == 1)
        <div class="row justify-content-end">
            <div class="col-lg-3 col-xs-12 text-end">
                <button type="button" class="btn btn-block bg-light mb-3" data-bs-toggle="modal" data-bs-target="#modal-default">Tambah Data</button>
            </div>
        </div>
    @else
        <div class="row justify-content-end">
            <form method="POST" action="{{ route('pembayaran.filter') }}">
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
                        <button type="submit" class="btn btn-block bg-light mb-3">Filter Data</button>
                    </div>
                </div>
            </form>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    @if (auth()->user()->role_id == 2)
                    <h6>Laporan Pembayaran</h6>
                    @else
                    <h6>Data Konfirmasi Pembayaran</h6>
                    @endif
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive">
                        <table id="tableTagihan" class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Tanggal Pembayaran</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        No Tagihan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                        User</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Jumlah Bayar</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                        Status</th>
                                    @if (auth()->user()->role_id == 1)
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $row)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2">
                                                <div class="my-auto">
                                                    <h6 class="mb-0 text-sm">{{$key+1}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{$row->tgl_bayar}}</p>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold">{{$row->id_tagihan}}</span>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold">{{$row->tagihan->user->name}}</span>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold">{{$row->total_bayar}}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            @if ($row->status_bayar == 0)
                                                <span class="me-2 text-xs font-weight-bold badge bg-gradient-info">Menunggu Konfirmasi</span>
                                            @elseif($row->status_bayar == 1)
                                            <span class="me-2 text-xs font-weight-bold badge bg-gradient-success">Valid</span>
                                            @else
                                                <span class="me-2 text-xs font-weight-bold badge bg-gradient-danger">Invalid</span>
                                            @endif
                                        </td>

                                        @if (auth()->user()->role_id == 1)
                                        <td class="align-middle">
                                            <div class="dropdown">
                                                <button class="btn btn-link text-secondary mb-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                                                </button>
                                                @if (auth()->user()->role_id == 1 && $row->status_bayar == 0)
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-edit-{{$row->id}}">Edit</a></li>
                                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-konfirmasi-{{$row->id}}">Konfirmasi</a></li>
                                                <li>
                                                    <form action="{{ route('pembayaran.destroy', $row->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item" onclick="return confirm('Hapus data ini?')" type="submit" >Delete</button>
                                                    </form>
                                                </li>
                                            </ul>
                                            @endif
                                            </div>
                                        </td>
                                        @endif
                                    </tr>

                                    <div class="modal fade" id="modal-edit-{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-edit" aria-hidden="true">
                                        <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="modal-title-default">Edit Pembayaran</h6>
                                                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <form method="POST" action="{{ route('pembayaran.update',[$row->id]) }}">
                                            @csrf
                                            @method('PUT')
                                                <div class="modal-body">
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="form-control-label">Tanggal Bayar</label>
                                                            <input type="date" class="form-control" name="tgl_bayar" value="{{$row->tgl_bayar}}" id="exampleFormControlInput1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="form-control-label">No Tagihan</label>
                                                            <select class="form-control" id="select1" name="id_tagihan">
                                                                @foreach ($tagihan as $data)
                                                                    <option value="{{$data->id_tagihan}}" {{ $data->id_tagihan == $row->id_tagihan ? 'selected' : '' }}>Tagihan No {{$data->id_tagihan}} - {{$data->user->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="example-text-input" class="form-control-label">Jumlah</label>
                                                                <input type="text" class="form-control" name="total_bayar" value="{{$row->total_bayar}}" id="exampleFormControlInput1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="action" value="edit" class="btn bg-gradient-primary">Save changes</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="modal-konfirmasi-{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-konfirmasi" aria-hidden="true">
                                        <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="modal-title-default">Konfirmasi Pembayaran</h6>
                                                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <form method="POST" action="{{ route('pembayaran.update',[$row->id]) }}">
                                            @csrf
                                            @method('PUT')
                                                <div class="modal-body">
                                                    <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <img width="250" src="{{ asset($row->bukti_bayar)}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="form-control-label">No Tagihan</label>
                                                            <input type="text" readonly class="form-control" value="No Tagihan {{$row->id_tagihan}} - {{$row->tagihan->user->name}}" id="exampleFormControlInput1">
                                                            <input type="hidden" class="form-control" value="{{$row->id_tagihan}}" id="exampleFormControlInput1">
                                                            <label for="example-text-input" class="form-control-label">Jumlah</label>
                                                            <input type="number" value="{{$row->total_bayar}}" class="form-control" id="exampleFormControlInput1">
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="action" value="konfirmasi"  class="btn bg-gradient-primary">Konfirmasi Pembayaran</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if (auth()->user()->role_id == 2)
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-4">
        </div>
        <div class="col-xl-6 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Pembayaran</p>
                        <div class="col-9">
                            <div class="numbers">
                                <h5 class="font-weight-bolder">
                                    Rp. {{ $total }}
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
        <div class="col-xl-3 col-sm-6 mb-4">
        </div>
    </div>
    @endif

    <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Tambah Pembayaran</h6>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form method="POST" action="{{ route('pembayaran.store') }}" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Tanggal Bayar</label>
                            <input type="date" name="tgl_bayar" class="form-control" id="exampleFormControlInput1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">No Tagihan</label>
                            <select class="form-control" id="select2" name="id_tagihan">
                                <option hidden selected>-- Select Tagihan --</option>
                                @foreach ($tagihan as $tagihan)
                                    <option value="{{$tagihan->id_tagihan}}">Tagihan No {{$tagihan->id_tagihan}} - {{$tagihan->user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Jumlah</label>
                                <input type="number" class="form-control" id="exampleFormControlInput1" name="total_bayar">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                </div>
            </form>
            </div>
        </div>
    </div>

@endsection

@push('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    <script>
        $(".nav-link").removeClass("active")
        $("#nav-link-pembayaran").addClass("active")

        $(document).ready(function() {
            $('#tableTagihan').DataTable();

            styleDatatable("tableTagihan")
        });
    </script>
@endpush
