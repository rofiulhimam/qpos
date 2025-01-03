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
            <a href="{{ route('staff') }}" id="btn-cancel">
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
                        <input type="text" class="placeholder" autocomplete="name" placeholder="Masukkan nama lengkap" style="border: none; background: transparent; width: 100%; outline: none;" name="name" id="name" value="">
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
                        <input type="email" class="placeholder" autocomplete="email" placeholder="Masukkan e-mail" style="border: none; background: transparent; width: 100%; outline: none;" name="email" id="email" value="">
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
                        <input type="password" class="placeholder" autocomplete="new-password" placeholder="Masukkan password" style="border: none; background: transparent; width: 100%; outline: none;" name="password" id="password" value="">
                    </div>
                </div>
                <div class="content-container">
                    <div class="left-content">
                        <div class="div">Konfirmasi Password</div>
                        <p class="p">
                            Silahkan konfirmasi password untuk akun anda
                        </p>
                    </div>
                    <div class="field">
                        <input type="password" class="placeholder" autocomplete="new-password" placeholder="Konfirmasi password" style="border: none; background: transparent; width: 100%; outline: none;" name="password_confirmation" id="password_confirmation" value="">
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

            // Ambil nilai password dan konfirmasi password
            let password = $('#password').val();
            let passwordConfirmation = $('#password_confirmation').val();

            // Validasi konfirmasi password
            if (password !== passwordConfirmation) {
                toastr.error('Konfirmasi password tidak sesuai dengan password.');
                return; // Hentikan eksekusi jika validasi gagal
            }

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

        // $('#btn-cancel').on('click', function (e) {
        //     e.preventDefault();

        //     const href = $(this).attr('href');

        //     Swal.fire({
        //         title: 'Apakah Anda yakin?',
        //         text: "Perubahan yang belum disimpan akan hilang jika anda meninggalkan halaman ini!",
        //         type: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#31602c',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Ya, kembali',
        //         cancelButtonText: 'Batal'
        //     }).then((result) => {
        //         if (result.value) {
        //             window.location.href = href;
        //         }
        //     });
        // });

        let formChanged = false;

        // Deteksi jika ada perubahan di form
        $('#form').on('change input', 'input, select, textarea', function () {
            formChanged = true;
        });

        // Handler untuk semua tautan yang menyebabkan navigasi
        $(document).on('click', 'a[href]', function (e) {
            const href = $(this).attr('href');

            // Abaikan jika ini adalah tautan kosong atau untuk modal
            if (!href || href.startsWith('#') || $(this).attr('target') === '_blank') {
                return;
            }

            if (formChanged) {
                e.preventDefault();
                confirmLeavePage(href);
            }
        });

        // Fungsi untuk konfirmasi sebelum meninggalkan halaman
        function confirmLeavePage(href) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Perubahan yang belum disimpan akan hilang jika Anda meninggalkan halaman ini!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#31602c',
                cancelButtonColor: '#9A9A9A', 
                confirmButtonText: 'Ya, tinggalkan halaman',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.value) {
                    window.location.href = href; // Arahkan ke halaman yang dituju
                }
            });
        }
    });
</script>
@endsection
