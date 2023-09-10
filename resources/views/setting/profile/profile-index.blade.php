@extends('cms.cms-index')
@section('custom-css')
    <link href="{{ asset('main') }}/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('main') }}/src/assets/css/light/components/tabs.css" rel="stylesheet" type="text/css" />

    <link href="{{ asset('main') }}/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('main') }}/src/assets/css/dark/components/tabs.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="row layout-top-spacing">
        <div class="col-lg-12 col-12 mt-2 mb-2">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <span class="header">Tambah Staff</span>
                    <span class="header">
                        <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-paper-plane"></i></button>
                    </span>
                </div>
                <div id="tabsWithIcons" class="card-body">
                    <div class="rounded-pills-icon">
                        <ul class="nav nav-pills mb-4 mt-3  justify-content-center" id="rounded-pills-icon-tab" role="tablist">
                            <li class="nav-item ml-2 mr-2">
                                <a class="nav-link mb-2 active text-center" id="rounded-pills-icon-home-tab" data-bs-toggle="pill" href="#rounded-pills-icon-home" role="tab" aria-controls="rounded-pills-icon-home" aria-selected="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> Home</a>
                            </li>
                            <li class="nav-item ml-2 mr-2">
                                <a class="nav-link mb-2 text-center" id="rounded-pills-icon-profile-tab" data-bs-toggle="pill" href="#rounded-pills-icon-profile" role="tab" aria-controls="rounded-pills-icon-profile" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Profile</a>
                            </li>
                            <li class="nav-item ml-2 mr-2">
                                <a class="nav-link mb-2 text-center" id="rounded-pills-icon-contact-tab" data-bs-toggle="pill" href="#rounded-pills-icon-contact" role="tab" aria-controls="rounded-pills-icon-contact" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg> Contact</a>
                            </li>

                        </ul>
                        <div class="tab-content" id="rounded-pills-icon-tabContent">
                            <div class="tab-pane fade show active" id="rounded-pills-icon-home" role="tabpanel" aria-labelledby="rounded-pills-icon-home-tab">
                                <div class="image text-center">
                                    <img src="{{ asset('storage/images/user/'.Auth::user()->photo) }}" class="card-img-top img-fluid" style="width: 250px; height: 250px;" alt="Profile-Picture" id="image-preview">
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6 col-12 mt-2 mb-2">
                                        <label for="name">Nama</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                    </div>
                                    @if(Auth::user()->type === 0)
                                    <div class="form-group col-lg-6 col-12 mt-2 mb-2">
                                        <label for="name">Grade Kelas</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="form-group col-lg-6 col-12 mt-2 mb-2">
                                        <label for="name">Kelas</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="form-group col-lg-6 col-12 mt-2 mb-2">
                                        <label for="name">Nomor Induk Siswa</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="form-group col-lg-6 col-12 mt-2 mb-2">
                                        <label for="name">Nomor Induk Siswa Nasional</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="form-group col-lg-6 col-12 mt-2 mb-2">
                                        <label for="name">Tahun Akademik ( Awal Masuk )</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="form-group col-lg-6 col-12 mt-2 mb-2">
                                        <label for="name">Tahun Akademik ( Saat Ini )</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="form-group col-lg-6 col-12 mt-2 mb-2">
                                        <label for="name">Nama Kurikulum</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                    </div>
                                    @elseif(Auth::user()->type === 1)
                                    <div class="form-group col-lg-6 col-12 mt-2 mb-2">
                                        <label for="name">Nomor Induk Tenaga Kependidikan</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="form-group col-lg-6 col-12 mt-2 mb-2">
                                        <label for="name">Divisi</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="form-group col-lg-6 col-12 mt-2 mb-2">
                                        <label for="name">Jabatan</label>
                                        <select name="position_id" id="position_id" class="form-select">
                                            <option value="" selected>Pilih Jabatan Anda</option>
                                            @foreach( $position as $key => $item )
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6 col-12 mt-2 mb-2">
                                        <label for="name">Awal Masuk Kerja</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="form-group col-lg-6 col-12 mt-2 mb-2">
                                        <label for="name">Nomor Surat Keputusan</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                    </div>
                                    @elseif(Auth::user()->type === 1)
                                    <div class="form-group col-lg-6 col-12 mt-2 mb-2">
                                        <label for="name">Nomor Induk Pengajar</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="form-group col-lg-6 col-12 mt-2 mb-2">
                                        <label for="name">Nomor Induk Pengajar</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                    </div>
                                    @endif
                                </div>    
                            </div>
                            <div class="tab-pane fade" id="rounded-pills-icon-profile" role="tabpanel" aria-labelledby="rounded-pills-icon-profile-tab">
                                <div class="row">
                                    <div class="col-lg-3 col-12 row">
                                        <div class="form-group col-lg-12 col-12 mb-2 mt-2 text-center">
                                            <img src="{{ asset('storage/images/user/'.Auth::user()->photo) }}" class="card-img-top img-fluid" style="width: 250px; height: 250px;" alt="Profile-Picture" id="image-preview">
                                            <input type="file" id="image" name="photo" class="form-control mt-3">
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-12 row">
                                        <div class="form-group col-lg-6 col-12 mt-2 mb-2">
                                            <label for="name">Nama</label>
                                            <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                        </div>
                                        <div class="form-group col-lg-6 col-12 mt-2 mb-2">
                                            <label for="name">Jabatan</label>
                                            <select name="position_id" id="position_id" class="form-select">
                                                <option value="" selected>Pilih Jabatan Anda</option>
                                                @foreach( $position as $key => $item )
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6 col-12 mt-2 mb-2">
                                            <label for="name">Nomor Induk Kependudukan</label>
                                            <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                        </div>
                                        <div class="form-group col-lg-6 col-12 mt-2 mb-2">
                                            <label for="name">Nomor Kartu Keluarga</label>
                                            <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                        </div>

                                        <div class="form-group col-lg-6 col-12 mt-2 mb-2">
                                            <label for="name">Alamat Email</label>
                                            <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->email }}">
                                        </div>
                                        <div class="form-group col-lg-6 col-12 mt-2 mb-2">
                                            <label for="name">Nomor Telepon</label>
                                            <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->phone }}">
                                        </div>
                                        <div class="form-group col-lg-6 col-12 mt-2 mb-2">
                                            <label for="name">Tempat Lahir</label>
                                            <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                        </div>
                                        <div class="form-group col-lg-6 col-12 mt-2 mb-2">
                                            <label for="name">Tanggal Lahir</label>
                                            <input type="date" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                        </div>
                                        <div class="form-group col-lg-6 col-12 mt-2 mb-2">
                                            <label for="name">Jenis Kelamin</label>
                                            <select name="name" id="name" class="form-select">
                                                <option value="" selected>Pilih Jenis Kelamin</option>
                                                <option value="1">Laki Laki</option>
                                                <option value="0">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6 col-12 mt-2 mb-2">
                                            <label for="name">Agama</label>
                                            <select name="name" id="name" class="form-select">
                                                <option value="" selected>Pilih Agama Anda</option>
                                                <option value="Agama Islam">Agama Islam</option>
                                                <option value="Agama Kristen">Agama Kristen</option>
                                                <option value="Agama Hindu">Agama Hindu</option>
                                                <option value="Agama Buddha">Agama Buddha</option>
                                                <option value="Agama Konghuchu">Agama Konghuchu</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            
                            </div>
                            <div class="tab-pane fade" id="rounded-pills-icon-contact" role="tabpanel" aria-labelledby="rounded-pills-icon-contact-tab">
                                <div class="row">

                                    <div class="form-group col-lg-6 col-12 mt-2 mb-2">
                                        <label for="name">Nama Ayah</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="form-group col-lg-6 col-12 mt-2 mb-2">
                                        <label for="name">Nomor Telepon Ayah</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="form-group col-lg-6 col-12 mt-2 mb-2">
                                        <label for="name">Nama Ibu</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="form-group col-lg-6 col-12 mt-2 mb-2">
                                        <label for="name">Nomor Telepon Ibu</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="form-group col-lg-6 col-12 mt-2 mb-2">
                                        <label for="name">Nama Wali ( Opsional )</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="form-group col-lg-6 col-12 mt-2 mb-2">
                                        <label for="name">Nomor Telepon Wali ( Opsional )</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom-js')
<script>

// Mendapatkan elemen-elemen yang dibutuhkan
const imageInput = document.getElementById('image');
const imagePreview = document.getElementById('image-preview');
const resetButton = document.getElementById('reset-button');

// Simpan URL gambar awal sebagai nilai default
const defaultImageSrc = imagePreview.src;

// Fungsi untuk menampilkan pratinjau gambar
function showImagePreview(file) {
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            imagePreview.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}

// Event listener ketika gambar diubah di input file
imageInput.addEventListener('change', function () {
    const selectedFile = this.files[0];
    showImagePreview(selectedFile);
});

// Event listener untuk tombol reset
resetButton.addEventListener('click', function () {
    // Kembalikan gambar ke gambar awal
    imagePreview.src = defaultImageSrc;
    // Reset nilai input file
    imageInput.value = '';
});
</script>
@endsection