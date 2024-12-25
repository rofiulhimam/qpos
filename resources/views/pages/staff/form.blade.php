@extends('template')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/page/edit-inventori.css') }}" />
@endpush

@section('title')
    Tambah Kategori
@endsection

@section('more-content')
    <div class="main-content">
        <div class="top">
            <div class="title" id="title">Tambah Kategori</div>
            <a href="{{ route('staff') }}">
                <div class="button">
                    <button type="button">Batal</button>
                </div>
            </a>
        </div>
        <form role="form" id="form" enctype="multipart/form-data">
            <div class="container">
                <div class="content-container">
                    <input type="hidden" name="metode" id="metode" value="tambah">
                    <input type="hidden" id="id" name="id" value="">
                    <div class="left-content">
                        <div class="div">Nama Lengkap</div>
                        <p class="p">
                            Tulis nama lengkap anda
                        </p>
                    </div>
                    <div class="field">
                        <input type="text" class="placeholder" placeholder="Masukkan nama kategori" style="border: none; background: transparent; width: 100%; outline: none;" name="name" id="name" value="">
                    </div>
                </div>
                <div class="content-container">
                    <div class="left-content">
                        <div class="div">E-mail</div>
                        <p class="p">
                            Tulis e-mail untuk akun anda
                        </p>
                    </div>
                    <div class="field">
                        <input type="email" class="placeholder" placeholder="Masukkan nama kategori" style="border: none; background: transparent; width: 100%; outline: none;" name="email" id="email" value="">
                    </div>
                </div>
                <div class="content-container">
                    <div class="left-content">
                        <div class="div">Password</div>
                        <p class="p">
                            Tulis password untuk akun anda
                        </p>
                    </div>
                    <div class="field">
                        <input type="password" class="placeholder" placeholder="Masukkan nama kategori" style="border: none; background: transparent; width: 100%; outline: none;" name="password" id="password" value="">
                    </div>
                </div>
                <div class="content-container">
                    <div class="left-content">
                        <div class="div">Role</div>
                        <p class="p">
                            Silahkan menentukan role akun anda.
                        </p>
                    </div>
                    <select class="field select-field" name="role" id="role">
                        <option value="" disabled selected>Pilih salah satu</option>
                        <option value="Admin">Admin</option>
                        <option value="Staff">Staff</option>
                    </select>
                </div>
            </div>
            <div class="button-bottom">
                <div class="button">
                    <button type="submit" id="btn-save" data-action="add">Simpan</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        // Simpan data (Tambah/Edit)
        $('#form').on('submit', function (e) {
            e.preventDefault();

            let formData = new FormData(this); // Gunakan FormData untuk menangani file
            formData.append('metode', $('#metode').val());
            formData.append('_token', "{{ csrf_token() }}");

            $.ajax({
                url: "{{ route('staff_crud') }}",
                method: "POST",
                data: formData,
                contentType: false, // Wajib untuk FormData
                processData: false, // Wajib untuk FormData
                success: function (response) {
                    sessionStorage.setItem('successMessage', response.message);
                    window.location.href = "{{ route('staff') }}";
                },
                error: function (xhr) {
                    toastr.error(xhr.responseJSON.message || "Gagal menyimpan data.");
                }
            });
        });
    });
</script>
@endsection
