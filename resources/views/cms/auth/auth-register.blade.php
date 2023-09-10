@extends('cms.cms-index')
@section('custom-css')
<style>
    .header{
        font-size: 20px;
    }
</style>
@endsection
@section('content')

<div class="row layout-top-spacing">
    <div class="col-lg-3 col-12 mt-2 mb-2">
        <form action="{{ route('usermanage.staff.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header text-center">
                    <span class="header">User Login</span>
                </div>
                <div class="card-body">
                    <div class="form-group mb-2 mt-2">
                        <label for="email">Alamat Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Inputkan email anda...">
                    </div>
                    <div class="form-group mb-2 mt-2">
                        <label for="password">Kata Sandi</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Inputkan email anda...">
                    </div>
                </div>
                <div class="card-footer text-center header">
                    <button type="submit" class="btn btn-outline-secondary"><i class="fa-solid fa-right-to-bracket"></i> Login</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-9 col-12 mt-2 mb-2">
        <div class="card">
            <div class="card-header">
                <span class="header">Informasi Terbaru</span>
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
</div>

@endsection
@section('custom-js')
@endsection