@extends('cms.cms-index')
@section('custom-css')
<style>
    .head{
        font-size: 20px;
    }
    .warn{
        font-size: 20px;
        text-color: red;
    }
</style>

@endsection
@section('content')
    <div class="row layout-top-spacing">
        <div class="col-lg 12 col-12">
            <div class="card">
                <div class="card-header">
                    <span class="head">Peringatan</span>
                </div>
                <div class="card-body">
                    <span class="warn">Mohon maaf. Kamu ga boleh ngakses halaman ini.</span>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom-js')

@endsection
