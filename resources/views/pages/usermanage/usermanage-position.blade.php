@extends('cms.cms-index')
@section('custom-css')
<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/src/table/datatable/datatables.css">
<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/light/table/datatable/dt-global_style.css">
<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/light/table/datatable/custom_dt_custom.css">
<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/dark/table/datatable/dt-global_style.css">
<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/dark/table/datatable/custom_dt_custom.css">
<style>
    .header{
        font-size: 20px;
    }
</style>

    <link rel="stylesheet" href="{{ asset('main') }}/src/plugins/src/sweetalerts2/sweetalerts2.css">
    <link href="{{ asset('main') }}/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('main') }}/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

@endsection
@section('content')
    <div class="row layout-top-spacing">
        <div class="col-lg-3 col-12 mt-2 mb-2">
            <form action="{{ route('usermanage.position.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <span class="header">Tambah Jabatan</span>
                        <span class="header">
                            <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-paper-plane"></i></button>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-2 mt-2">
                            <label for="divisi_id">Pilih Divisi</label>
                            <select name="divisi_id" id="divisi_id" class="form-select">
                                <option value="" selected>Pilih Bagian Divisi</option>
                                @foreach($divisi as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-2 mt-2">
                            <label for="name">Nama Jabatan</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Inputkan nama Jabatan disini...">
                        </div>
                        <div class="form-group mb-2 mt-2">
                            <label for="code">Kode Jabatan</label>
                            <input type="text" name="code" id="code" class="form-control" placeholder="Inputkan kode Jabatan disini..." maxlength="4" pattern="[A-Z]*" title="Hanya huruf yang diizinkan">
                        </div>
                        <div class="form-group mb-2 mt-2">
                            <label for="sallary">Gaji Pokok</label>
                            <input type="text" name="sallary" id="sallary" class="form-control" placeholder="Inputkan Gaji Pokok disini...">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-9 col-12 mt-2 mb-2">
            <div class="card">
                <div class="card-header">
                    <span class="header">{{ $submenu }}</span>
                </div>
                <div class="card-body">
                <table id="style-3" class="table style-3 dt-table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Record Id</th>
                                <th class="text-center">Bagian Divisi</th>
                                <th class="text-center">Nama Jabatan</th>
                                <th class="text-center">Kode Jabatan</th>
                                <th class="text-center">Gaji Pokok</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($position as $key => $item)
                            <tr>
                                <td class="checkbox-column text-center"> {{ ++$key }} </td>
                                <td class="text-center">{{ $item->divisi->name }}</td>
                                <td class="text-center">{{ $item->name }}</td>
                                <td class="text-center">{{ $item->code }}</td>
                                <td class="text-center"> {{ number_format($item->sallary, 0, ',', '.') }} </td>
                                <td class="text-center d-flex justify-content-center align-items-center">
                                    <a style="margin-right: 10px;" data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}" class="btn btn-rounded btn-outline-secondary bs-tooltip me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                        <i class="fa-solid fa-edit"></i>
                                    </a>
                                    <form id="delete-form-{{ $item->id }}" action="{{ route('usermanage.position.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"
                                            data-url="{{ route('usermanage.position.destroy', $item->id) }}" data-name="{{ $item->name }}"
                                            onclick="deleteData('{{ $item->id }}')">
                                            <i class="fa-solid fa-trash-can"></i>
                                         </a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @foreach($position as $key => $item)
    <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('usermanage.position.update', $item->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-content">
                    <div class="modal-header" style="font-size: 20px;">
                        <h5 class="modal-title" id="tabsModalLabel">Edit Jabatan</h5>
                        <div class="d-flex justify-content-between align-items-center">

                            <button style="margin-right: 10px;" type="submit" class="btn btn-rounded btn-outline-secondary" data-bs-dismiss="modal">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                            <button style="" type="button" class="btn btn-rounded btn-outline-warning" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa-solid fa-close"></i>
                            </button>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="form-group mb-2 mt-2">
                            <label for="name">Nama Jabatan</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Inputkan nama Jabatan disini..." value="{{ $item->name }}">
                        </div>
                        <div class="form-group mb-2 mt-2">
                            <label for="code">Kode Jabatan</label>
                            <input type="text" name="code" id="code" class="form-control" placeholder="Inputkan kode Jabatan disini..." value="{{ $item->code }}" maxlength="4" pattern="[A-Z]*" title="Hanya huruf yang diizinkan">
                        </div>
                        <div class="form-group mb-2 mt-2">
                            <label for="sallary">Gaji Pokok</label>
                            <input type="text" name="sallary" id="sallary" class="form-control" placeholder="Inputkan Gaji Pokok disini..." value="{{ $item->sallary }}">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endforeach
@endsection
@section('custom-js')
    <script src="{{ asset('main') }}/src/assets/js/custom.js"></script>
    <link href="{{ asset('main') }}/layouts/vertical-dark-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('main') }}/layouts/vertical-dark-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />
    <script src="{{ asset('main') }}/src/plugins/src/table/datatable/datatables.js"></script>
    <script src="{{ asset('main') }}/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>

    <script>
        // var e;

        c3 = $('#style-3').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [5, 10, 20, 50, 100],
            "pageLength": 10
        });

        multiCheck(c3);
    </script>
    <script>
        function deleteData(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are going to delete this item.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire(
                        'Cancelled',
                        'Deletion cancelled',
                        'error'
                    );
                }
            });
        }
    </script>
@endsection
