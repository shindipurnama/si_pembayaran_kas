@extends('index')

@section('content')
    <div class="row justify-content-end">
        <div class="col-lg-3 col-xs-12 text-end">
            <button type="button" class="btn btn-block bg-success mb-3" data-bs-toggle="modal" data-bs-target="#modal-qr">QR Pembayaran</button>
            @if (auth()->user()->role_id == 1)
                <button type="button" class="btn btn-block bg-light mb-3" data-bs-toggle="modal" data-bs-target="#modal-default">Tambah Data</button>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Data Tagihan</h6>
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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">action</th>
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
                                        <td class="align-middle">
                                            <div class="dropdown">
                                                <button class="btn btn-link text-secondary mb-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    @if (auth()->user()->role_id == 2 && $row->status_bayar == 0)
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-bayar-{{$row->id}}">Upload Bukti</a></li>
                                                    @endif
                                                    @if (auth()->user()->role_id == 1)
                                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-edit-{{$row->id}}">Edit</a></li>
                                                        @if($row->status_tagihan == 0)
                                                            <li>
                                                                <form action="{{ route('tagihan.destroy', $row->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="dropdown-item" onclick="return confirm('Hapus data ini?')" type="submit" >Delete</button>
                                                                </form>
                                                            </li>
                                                        @endif
                                                    @endif
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="modal-edit-{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-edit" aria-hidden="true">
                                        <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="modal-title-default">Edit Tagihan</h6>
                                                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <form method="POST" action="{{ route('tagihan.update',[$row->id]) }}">
                                            @csrf
                                            @method('PUT')
                                                <div class="modal-body">
                                                        <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-text-input" class="form-control-label">Tanggal Tagihan</label>
                                                                <input type="date" class="form-control" required name="tgl_tagihan" value="{{$row->tgl_tagihan}}"  id="exampleFormControlInput1">
                                                                <input type="hidden" class="form-control" required name="id_tagihan" value="{{$row->id}}" id="exampleFormControlInput1">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-text-input" class="form-control-label">User</label>
                                                                <select class="form-control" required id="select2" name="id_user">
                                                                    @foreach ($users as $user)
                                                                        <option value="{{$user->id}}" {{ $user->id == $row->id_user ? 'selected' : '' }}>{{$user->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="form-control-label">Jumlah</label>
                                                                    <input type="text" class="form-control" required name="jumlah"  value="{{$row->jumlah}}"  id="exampleFormControlInput1">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="form-control-label">Keterangan</label>
                                                                    <input type="text" class="form-control" required name="keterangan" value="{{$row->keterangan}}"  id="exampleFormControlInput1">
                                                                    <input type="hidden" class="form-control" required name="status_tagihan" value="0" id="exampleFormControlInput1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                                            </form>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="modal-bayar-{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-bayar" aria-hidden="true">
                                        <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="modal-title-default">Upload Bukti</h6>
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
                                                                <input type="date" class="form-control" required name="tgl_bayar" id="exampleFormControlInput1">
                                                                <input type="hidden" class="form-control" required name="id_tagihan" value="{{$row->id_tagihan}}" id="exampleFormControlInput1">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="example-text-input" class="form-control-label">Jenis Pembayaran</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="metode_bayar" value="1" id="customRadio1">
                                                                <label class="custom-control-label" for="customRadio1">Ovo</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="example-text-input" class="form-control-label"> &nbsp;</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="metode_bayar" value="2" id="customRadio2">
                                                                <label class="custom-control-label" for="customRadio2">Dana</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-text-input" class="form-control-label">Bukti Bayar</label>
                                                                <input type="file" class="form-control" required  name="bukti_bayar" id="exampleFormControlInput1">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-text-input" class="form-control-label">Jumlah</label>
                                                                <input type="number" class="form-control" name="total_bayar" {{$row->jumlah}}  required id="exampleFormControlInput1">
                                                                <input type="hidden" class="form-control" name="status_bayar" value="0" required id="exampleFormControlInput1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn bg-gradient-primary">Bayar</button>
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
    @endif

    <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Tambah Tagihan</h6>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form method="POST" action="{{ route('tagihan.store') }}">
            @csrf
                <div class="modal-body">
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Tanggal Tagihan</label>
                                <input type="date" class="form-control" required name="tgl_tagihan" id="exampleFormControlInput1">
                                <input type="hidden" class="form-control" required name="id_tagihan" value="{{$id}}" id="exampleFormControlInput1">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">User</label>
                                <select class="form-control" required id="select2" name="id_user">
                                    @foreach ($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Jumlah</label>
                                    <input type="text" class="form-control" required name="jumlah" id="exampleFormControlInput1">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Keterangan</label>
                                    <input type="text" class="form-control" required name="keterangan" id="exampleFormControlInput1">
                                    <input type="hidden" class="form-control" required name="status_tagihan" value="0" id="exampleFormControlInput1">
                                    <input type="hidden" class="form-control" required name="notifikasi_status" value="0" id="exampleFormControlInput1">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                </div>
                </div>
            </form>
        </div>
    </div>



    <div class="modal fade" id="modal-qr" tabindex="-1" role="dialog" aria-labelledby="modal-bayar" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Pembayaran</h6>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="customRadio1">
                                <label class="custom-control-label" for="customRadio1">Ovo</label>
                            </div>
                                <img width="340" src="{{ asset('/assets/img/ovo.jpg')}}">
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="customRadio2">
                                <label class="custom-control-label" for="customRadio2">Dana</label>
                            </div>
                            <img width="340" src="{{ asset('/assets/img/dana.png')}}">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

@endsection

@push('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    <script>
        $(".nav-link").removeClass("active")
        $("#nav-link-tagihan").addClass("active")

        $(document).ready(function() {
            $('#tableTagihan').DataTable();

            styleDatatable("tableTagihan")
        });
    </script>
@endpush
