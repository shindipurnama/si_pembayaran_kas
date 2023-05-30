@extends('index')

@section('content')
    @if (auth()->user()->role_id == 1)
        <div class="row justify-content-end">
            <div class="col-lg-3 col-xs-12 text-end">
                <button type="button" class="btn btn-block bg-light mb-3" data-bs-toggle="modal" data-bs-target="#modal-default">Tambah Data</button>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Data Pembayaran</h6>
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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Jumlah Bayar</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                        Status</th>
                                    @if (auth()->user()->role_id == 1)
                                        <th>action</th>
                                    @endif
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
                                        <span class="text-xs font-weight-bold">T/23/05/001</span>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">Rp. 50.000</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="me-2 text-xs font-weight-bold badge bg-gradient-success">Valid</span>
                                    </td>

                                    @if (auth()->user()->role_id == 1)
                                    <td class="align-middle">
                                        <div class="dropdown">
                                            <button class="btn btn-link text-secondary mb-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-edit">Edit</a></li>
                                              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-konfirmasi">Konfirmasi</a></li>
                                              <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    @endif
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
                                        <span class="text-xs font-weight-bold">T/23/05/001</span>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">Rp. 50.000</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="me-2 text-xs font-weight-bold badge bg-gradient-danger">Invalid</span>
                                    </td>
                                    @if (auth()->user()->role_id == 1)
                                    <td class="align-middle">
                                        <div class="dropdown">
                                            <button class="btn btn-link text-secondary mb-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-edit">Edit</a></li>
                                              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-konfirmasi">Konfirmasi</a></li>
                                              <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    @endif
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
                                        <span class="text-xs font-weight-bold">T/23/05/001</span>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">Rp. 50.000</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="me-2 text-xs font-weight-bold badge bg-gradient-success">Valid</span>
                                    </td>
                                    @if (auth()->user()->role_id == 1)
                                    <td class="align-middle">
                                        <div class="dropdown">
                                            <button class="btn btn-link text-secondary mb-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-edit">Edit</a></li>
                                              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-konfirmasi">Konfirmasi</a></li>
                                              <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    @endif
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
                                        <span class="text-xs font-weight-bold">T/23/05/001</span>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">Rp. 50.000</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="me-2 text-xs font-weight-bold badge bg-gradient-success">Valid</span>
                                    </td>
                                    @if (auth()->user()->role_id == 1)
                                    <td class="align-middle">
                                        <div class="dropdown">
                                            <button class="btn btn-link text-secondary mb-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-edit">Edit</a></li>
                                              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-konfirmasi">Konfirmasi</a></li>
                                              <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    @endif
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
                                        <span class="text-xs font-weight-bold">T/23/05/001</span>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">Rp. 50.000</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="me-2 text-xs font-weight-bold badge bg-gradient-info">Munggu Konfirmasi</span>
                                    </td>
                                    @if (auth()->user()->role_id == 1)
                                    <td class="align-middle">
                                        <div class="dropdown">
                                            <button class="btn btn-link text-secondary mb-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-edit">Edit</a></li>
                                              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-konfirmasi">Konfirmasi</a></li>
                                              <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    @endif
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
                                        <span class="text-xs font-weight-bold">T/23/05/001</span>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">Rp. 50.000</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="me-2 text-xs font-weight-bold badge bg-gradient-danger" > Invalid</span>
                                    </td>
                                    @if (auth()->user()->role_id == 1)
                                    <td class="align-middle">
                                        <div class="dropdown">
                                            <button class="btn btn-link text-secondary mb-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-edit">Edit</a></li>
                                              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-konfirmasi">Konfirmasi</a></li>
                                              <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    @endif
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
                <h6 class="modal-title" id="modal-title-default">Tambah Pembayaran</h6>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Tanggal Bayar</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">No Tagihan</label>
                            <select class="form-control" id="select2">
                                <option>T/23/05/001</option>
                                <option>T/23/05/002</option>
                                <option>T/23/05/003</option>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Jumlah</label>
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
                <h6 class="modal-title" id="modal-title-default">Edit Pembayaran</h6>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Tanggal Bayar</label>
                            <input type="date" class="form-control" value="{{date('Y-m-d')}}" id="exampleFormControlInput1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">No Tagihan</label>
                            <select class="form-control" id="select2">
                                <option>T/23/05/001</option>
                                <option>T/23/05/002</option>
                                <option>T/23/05/003</option>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Jumlah</label>
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
    <div class="modal fade" id="modal-konfirmasi" tabindex="-1" role="dialog" aria-labelledby="modal-konfirmasi" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Konfirmasi Pembayaran</h6>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <img width="250" src="{{ asset('/assets/img/curved-images/curved12.jpg')}}">
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">No Tagihan</label>
                            <input type="text" class="form-control" value="T/23/05/003" id="exampleFormControlInput1">
                            <label for="example-text-input" class="form-control-label">Jumlah</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1">
                        </div>
                    </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn bg-gradient-primary">Konfirmasi Pembayaran</button>
            </div>
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
