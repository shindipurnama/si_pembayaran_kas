@extends('index')

@section('content')
    <div class="row justify-content-end">
        <div class="col-lg-3 col-xs-12 text-end">
            <button type="button" class="btn btn-block bg-light mb-3" data-bs-toggle="modal" data-bs-target="#modal-default">Tambah Data</button>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Data Tagihan</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    {{-- <div class="table-responsive"> --}}
                        <table id="tableTagihan" class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Alamat</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Email</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        No. Tlp</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Role</th>
                                    <th width="10">action</th>
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
                                        <p class="text-sm font-weight-bold mb-0">Chika Pangestu</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">Jl. Cempaka 32</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">chikapang@gmail.com</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">0819204102</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">Admin</p>
                                    </td>
                                    <td class="align-middle">
                                        <div class="dropdown">
                                            <button class="btn btn-link text-secondary mb-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-edit">Edit</a></li>
                                              <li><a class="dropdown-item" href="#">Delete</a></li>
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
                                        <p class="text-sm font-weight-bold mb-0">Dahlia Angelica</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">Jl. Cempaka 52</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">dahlia901@gmail.com</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">08172912912</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">User</p>
                                    </td>
                                    <td class="align-middle">
                                        <div class="dropdown">
                                            <button class="btn btn-link text-secondary mb-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-edit">Edit</a></li>
                                              <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Tambah Role</h6>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Nama</label>
                            <input class="form-control" type="text" placeholder="Masukan Nama">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Email address</label>
                            <input class="form-control" type="email" placeholder="Masukan Email">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="example-text-input" class="form-control-label">No. Tlp</label>
                            <input class="form-control" type="text" placeholder="Masukan No Tlp">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Alamat</label>
                            <input class="form-control" type="text" placeholder="Masukan Alamat">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Role</label>
                            <select class="form-control" id="select2">
                                <option>User</option>
                                <option>Admin</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Status</label>
                            <select class="form-control" id="select2">
                                <option>Aktif</option>
                                <option>Non Aktif</option>
                            </select>
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
                            <label for="example-text-input" class="form-control-label">Nama</label>
                            <input class="form-control" type="text" placeholder="Masukan Nama">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Email address</label>
                            <input class="form-control" type="email" placeholder="Masukan Email">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="example-text-input" class="form-control-label">No. Tlp</label>
                            <input class="form-control" type="text" placeholder="Masukan No Tlp">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Alamat</label>
                            <input class="form-control" type="text" placeholder="Masukan Alamat">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Role</label>
                            <select class="form-control" id="select2">
                                <option>User</option>
                                <option>Admin</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Status</label>
                            <select class="form-control" id="select2">
                                <option>Aktif</option>
                                <option>Non Aktif</option>
                            </select>
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

@endsection

@push('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    <script>
        $(".nav-link").removeClass("active")
        $("#nav-link-user").addClass("active")

        $(document).ready(function() {
            $('#tableTagihan').DataTable();

            styleDatatable("tableTagihan")
        });
    </script>
@endpush
