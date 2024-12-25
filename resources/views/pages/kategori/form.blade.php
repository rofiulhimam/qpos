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
                        <div class="div">Nama Kategori</div>
                        <p class="p">
                            Tulis nama kategori untuk produk anda
                        </p>
                    </div>
                    <div class="field">
                        <input type="text" class="placeholder" placeholder="Masukkan nama kategori" style="border: none; background: transparent; width: 100%; outline: none;" name="name" id="name" value="">
                    </div>
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
        // Jika mode edit, ambil data kategori
        const urlParams = new URLSearchParams(window.location.search);
        const id = urlParams.get('id');
        if (id) {
            $('.title').html('Edit Kategori');
            $('#metode').val('edit');
            $('#id').val(id);
            $.ajax({
                url: "{{ route('kategori_crud') }}",
                method: "GET",
                success: function (response) {
                    const data = response.find(item => item.id == id);
                    if (data) {
                        $('#name').val(data.name);
                    }
                }
            });
        }

        // Simpan data (Tambah/Edit)
        $('#form').on('submit', function (e) {
            e.preventDefault();
            const metode = $('#metode').val();
            const formData = {
                id: $('#id').val(),
                name: $('#name').val(),
                metode: metode,
                _token: "{{ csrf_token() }}"
            };

            $.ajax({
                url: "{{ route('kategori_crud') }}",
                method: "POST",
                data: formData,
                success: function (response) {
                    sessionStorage.setItem('successMessage', response.message);
                    window.location.href = "{{ route('kategori') }}";
                },
                error: function (xhr) {
                    // alert('Gagal menyimpan data.');
                    toastr.error("Gagal menyimpan data.");
                }
            });
        });
    });
</script>
@endsection
