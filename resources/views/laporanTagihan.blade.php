@extends('index')

@section('content')
    <div class="row justify-content-end">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-4">
                    <input class="form-control" type="month" value="{{date('Y-m')}}" id="example-month-input">
                </div>
                <div class="col-4">
                    <button type="button" class="btn btn-block bg-light mb-3" data-bs-toggle="modal" data-bs-target="#modal-default">Filter Data</button>
                </div>
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
                                        Tanggal</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Keterangan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        User</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                        Status</th>
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
