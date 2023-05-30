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
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                        Status</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm">1</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">22 / 05 / 2023</p>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">Tagihan Mei</span>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">Chika</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="me-2 text-xs font-weight-bold badge bg-gradient-success">Lunas</span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="dropdown">
                                            <button class="btn btn-link text-secondary mb-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                @if (auth()->user()->role_id == 2)
                                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-bayar">Upload Bukti</a></li>
                                                @endif
                                                @if (auth()->user()->role_id == 1)
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-edit">Edit</a></li>
                                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm">2</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">22 / 05 / 2023</p>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">Tagihan Mei</span>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">Chika</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="me-2 text-xs font-weight-bold badge bg-gradient-danger">Belum Bayar</span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="dropdown">
                                            <button class="btn btn-link text-secondary mb-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-edit">Edit</a></li>
                                              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-bayar">Upload Bukti</a></li>
                                              <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm">3</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">22 / 05 / 2023</p>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">Tagihan Mei</span>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">Chika</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="me-2 text-xs font-weight-bold badge bg-gradient-success">Lunas</span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="dropdown">
                                            <button class="btn btn-link text-secondary mb-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-edit">Edit</a></li>
                                              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-bayar">Upload Bukti</a></li>
                                              <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm">4</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">22 / 05 / 2023</p>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">Tagihan Mei</span>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">Chika</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="me-2 text-xs font-weight-bold badge bg-gradient-success">Lunas</span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="dropdown">
                                            <button class="btn btn-link text-secondary mb-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-edit">Edit</a></li>
                                              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-bayar">Upload Bukti</a></li>
                                              <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm">5</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">22 / 05 / 2023</p>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">Tagihan Mei</span>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">Chika</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="me-2 text-xs font-weight-bold badge bg-gradient-info">Munggu Konfirmasi</span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="dropdown">
                                            <button class="btn btn-link text-secondary mb-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-edit">Edit</a></li>
                                              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-bayar">Upload Bukti</a></li>
                                              <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm">6</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">22 / 05 / 2023</p>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">Tagihan Mei</span>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">Chika</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="me-2 text-xs font-weight-bold badge bg-gradient-danger" > Belum Bayar</span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="dropdown">
                                            <button class="btn btn-link text-secondary mb-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-edit">Edit</a></li>
                                              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-bayar">Upload Bukti</a></li>
                                              <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Tambah Tagihan</h6>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Tanggal Tagihan</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">User</label>
                            <select class="form-control" id="select2">
                                <option>Chika</option>
                                <option>Andre</option>
                                <option>Hanifa</option>
                                <option>Dahlia</option>
                                <option>Joko</option>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Keterangan</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn bg-gradient-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modal-edit" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Edit Tagihan</h6>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Tanggal Tagihan</label>
                            <input type="date" value="{{date('Y-m-d')}}" class="form-control" id="exampleFormControlInput1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">User</label>
                            <select class="form-control" id="select2">
                                <option>Chika</option>
                                <option>Andre</option>
                                <option>Hanifa</option>
                                <option>Dahlia</option>
                                <option>Joko</option>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Keterangan</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn bg-gradient-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-bayar" tabindex="-1" role="dialog" aria-labelledby="modal-bayar" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Upload Bukti</h6>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Bukti Bayar</label>
                                <input type="file" class="form-control" id="exampleFormControlInput1">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Jumlah</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="customRadio1">
                                <label class="custom-control-label" for="customRadio1">Ovo</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="customRadio2">
                                <label class="custom-control-label" for="customRadio2">Dana</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn bg-gradient-primary">Bayar</button>
            </div>
            </div>
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
                            <img width="340" src="{{ asset('/assets/img/dana.jpeg')}}">
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
