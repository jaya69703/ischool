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
            <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <span class="header">Tambah Menu</span>
                        <span class="header">
                            <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-paper-plane"></i></button>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-2 mt-2">
                            <label for="name">Nama Menu</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Inputkan Nama Menu...">
                        </div>
                        <div class="form-group mb-2 mt-2">
                            <label for="locate">Lokasi Menu</label>
                            <select name="locate" id="locate" class="form-select">
                                <option selected>Pilih Lokasi Menu</option>
                                <option value="0">0 - For Front-End</option>
                                <option value="1">1 - For Back-End</option>
                            </select>
                        </div>
                        <div class="form-group mb-2 mt-2">
                            <label for="name">Type Menu</label>
                            <select name="type" id="type" class="form-select">
                                <option selected>Pilih Type Menu</option>
                                <option value="0">Single Menu</option>
                                <option value="1">Dropdown</option>
                            </select>
                        </div>
                        <div class="form-group mb-2 mt-2" id="menuSelectorSingle" style="display: none;">
                            <label for="name">Nama Fontawesome</label>
                            <input type="text" name="icon" id="icon" class="form-control" placeholder="Copy nama icon disini...">
                        </div>
                        <div class="form-group mb-2 mt-2">
                            <label for="name">Nama URL</label>
                            <input type="text" name="url" id="url" class="form-control" placeholder="Copy nama url disini...">
                        </div>
                        <div class="form-group mb-2 mt-2" id="menuSelectorDropdown" style="display: none;">
                            <label for="name">Pilih Menu</label>
                            <select name="parent_id" id="parent_id" class="form-select">
                                <option value="" selected>Pilih Parent Menu</option>
                                @foreach($menulist as $item)
                                @if($item->type === 0)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
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
                                <th class="text-center">Nama Menu</th>
                                <th class="text-center">Icon Menu</th>
                                <th class="text-center">Type Menu</th>
                                <th class="text-center">URL</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($menulist as $key => $item)
                            <tr>
                                <td class="checkbox-column text-center"> {{ ++$key }} </td>
                                <td class="">{{ $item->name }}</td>
                                <td class="text-center">{{ $item->icon }}</td>
                                <td class="text-center">
                                    @if($item->type === 0)
                                    <span class="badge badge-success">Single Menu</span>
                                    @elseif($item->type === 1)
                                    <span class="badge badge-danger">SubMenu By {{ $item->parent->name }}</span>
                                    @endif
                                </td>
                                <td class="text-center">{{ $item->url }}</td>
                                <td class="text-center d-flex justify-content-center align-items-center">
                                    <a style="margin-right: 10px;" data-bs-toggle="modal" data-bs-target="#editMenu{{ $item->id }}" class="btn btn-rounded btn-outline-secondary bs-tooltip me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                        <i class="fa-solid fa-edit"></i>
                                    </a>
                                    <form id="delete-form-{{ $item->id }}" action="{{ route('menu.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"
                                            data-url="{{ route('menu.destroy', $item->id) }}" data-name="{{ $item->name }}"
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


    @foreach($menulist as $key => $item)
    <div class="modal fade" id="editMenu{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('menu.update', $item->id) }}" method="POST">
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
                            <label for="name">Nama Menu</label>
                            <input type="text" class="form-control mb-2" name="name" id="name" placeholder="Enter menu name..." value="{{ $item->name }}">
                        </div>
                        <div class="form-group mb-2 mt-2">
                            <label for="locate">Lokasi Menu</label>
                            <select name="locate" id="locate" class="form-select">
                                <option value="0" {{ $item->locate == 0 ? 'selected' : '' }}> 0 - Front-End</option>
                                <option value="1" {{ $item->locate == 1 ? 'selected' : '' }}> 1 - Back-End</option>
                            </select>
                        </div>
                        <div class="form-group mb-2 mt-2">
                            <label for="icon">Nama Fontawesome</label>
                            <input type="text" class="form-control mb-2" name="icon" id="icon" placeholder="Enter icon name..." value="{{ $item->icon }}">
                        </div>
                        <div class="form-group mb-2 mt-2">
                            <label for="url">Nama URL</label>
                            <input type="text" class="form-control mb-2" name="url" id="url" placeholder="Enter url name..." value="{{ $item->url }}">
                        </div>
                        <div class="form-group mb-2 mt-2">
                            <label for="type">Type Menu</label>
                            <select name="type" id="type" class="form-select">
                                <option value="0" {{ $item->type == 0 ? 'selected' : '' }}>Single Menu</option>
                                <option value="1" {{ $item->type == 1 ? 'selected' : '' }}>Dropdown</option>
                            </select>
                        </div>
                        <div class="form-group mb-2 mt-2">
                            <label for="parent_id">Pilih Menu</label>
                            <select name="parent_id" id="parent_id" class="form-select">
                                @if(!$item->parent_id)
                                <option value="{{ $item->parent_id }}" selected>Pilih Parent Menu</option>
                                @else
                                <option value="{{ $item->parent_id }}" selected>{{ $item->parent->name }}</option>
                                @endif
                                @foreach($menulist as $item)
                                @if($item->type === 0)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                                @endforeach
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
                if ($(this).val() === '0') { // Jika "Type Menu" dipilih sebagai Dropdown
                    $('#menuSelectorSingle').show();
                } else {
                    $('#menuSelectorSingle').hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#type').on('change', function() {
                if ($(this).val() === '1') { // Jika "Type Menu" dipilih sebagai Dropdown
                    $('#menuSelectorDropdown').show();
                } else {
                    $('#menuSelectorDropdown').hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#type').on('change', function() {
                if ($(this).val() === '0') { // Jika "Type Menu" dipilih sebagai Dropdown
                    $('#menuModalSingle').show();
                } else {
                    $('#menuModalSingle').hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#type').on('change', function() {
                if ($(this).val() === '1') { // Jika "Type Menu" dipilih sebagai Dropdown
                    $('#menuModalDropdown').show();
                } else {
                    $('#menuModalDropdown').hide();
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
