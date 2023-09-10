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
            <form action="{{ route('usermanage.staff.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <span class="header">Tambah Staff</span>
                        <span class="header">
                            <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-paper-plane"></i></button>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-2 mt-2">
                            <label for="name">Nama Pengguna</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Inputkan Nama Pengguna...">
                        </div>
                        <div class="form-group mb-2 mt-2">
                            <label for="email">Alamat Email Pengguna</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Inputkan Email Pengguna...">
                        </div>
                        <div class="form-group mb-2 mt-2">
                            <label for="phone">Nomor Telepon ( WA)</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Inputkan Nomor HP Pengguna...">
                        </div>
                        <div class="form-group mb-2 mt-2">
                            <label for="name">Type Pengguna</label>
                            <select name="type" id="type" class="form-select">
                                <option value="" selected>Pilih Type Pengguna</option>
                                <option value="0">Pengguna Siswa</option>
                                <option value="1">Pengguna Karyawan</option>
                                <option value="2">Pengguna Guru</option>
                            </select>
                        </div>
                        <div class="form-group mb-2 mt-2">
                            <label for="divisi_id">Pilih Divisi</label>
                            <select name="divisi_id" id="divisi_id" class="form-select">
                                <option value="" selected>Pilih Divisi Pengguna</option>
                                @foreach($divisi as $key => $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-2 mt-2">
                            <label for="position_id">Pilih Jabatan</label>
                            <select name="position_id" id="position_id" class="form-select">
                                <option value="" selected>Pilih Jabatan Pengguna</option>
                                @foreach($position as $key => $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
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
                                <th class="text-center">Nama User</th>
                                <th class="text-center">Jabatan</th>
                                <th class="text-center">Nomor Telepon</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usermanage as $key => $item)
                            <tr>
                                <td class="checkbox-column text-center"> {{ ++$key }} </td>
                                <td class="text-center">{{ $item->staff->staff_name }}</td>
                                <td class="text-center">{{ $item->staff->position->divisi->name }}</td>
                                <td class="text-center">{{ $item->staff->staff_phone }}</td>
                                <td class="text-center">
                                    @if($item->isverify === 0)
                                    <span class="badge badge-danger">Belum Verify</span>
                                    @elseif($item->isverify === 1)
                                    <span class="badge badge-success">Sudah Verify</span>
                                    @endif
                                </td>
                                <td class="text-center d-flex justify-content-center align-items-center">
                                    <a  href="{{ route('usermanage.staff.edit', $item->id) }}" style="margin-right: 10px;" class="btn btn-rounded btn-outline-warning bs-tooltip me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a style="margin-right: 10px;" data-bs-toggle="modal" data-bs-target="#editMenu{{ $item->id }}" class="btn btn-rounded btn-outline-secondary bs-tooltip me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                        <i class="fa-solid fa-edit"></i>
                                    </a>
                                    <form id="delete-form-{{ $item->id }}" action="{{ route('usermanage.staff.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"
                                            data-url="{{ route('usermanage.staff.destroy', $item->id) }}" data-name="{{ $item->name }}"
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


    @foreach($usermanage as $key => $item)
    <div class="modal fade" id="editMenu{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('usermanage.staff.update', $item->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-content">
                    <div class="modal-header" style="font-size: 20px;">
                        <h5 class="modal-title" id="tabsModalLabel">Edit Menu</h5>
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
                            <label for="isverify">Ubah Status Akun</label>
                            <select name="isverify" id="isverify" class="form-select">
                                <option value="0" {{ $item->isverify == 0 ? 'selected' : '' }}>Belum Verify</option>
                                <option value="1" {{ $item->isverify == 1 ? 'selected' : '' }}>Sudah Verify</option>
                            </select>
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
    $(document).ready(function() {
        $('#type').on('change', function() {
            if ($(this).val() === '1') { // Jika "Type Menu" memiliki value 1 (Drop-down)
                $('#menuSelector').show();
            } else {
                $('#menuSelector').hide();
            }
        });
    });
    </script>
    <script>
        $(document).ready(function() {
            $('#type').on('change', function() {
                if ($(this).val() === '1') { // Jika "Type Menu" dipilih sebagai Dropdown
                    $('#menuSelector2').show();
                } else {
                    $('#menuSelector2').hide();
                }
            });
        });
    </script>

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
