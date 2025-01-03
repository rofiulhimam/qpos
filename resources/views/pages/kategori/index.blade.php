@extends('template')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/page/inventori.css') }}" />
@endpush

@section('title')
    Inventori
@endsection

@section('main-content')
<div class="main-content">
    <div class="button-header" style="display: flex; justify-content: space-between;">
        <div style="font-size: 20px; font-weight: 600;">
            Manajemen Kategori
        </div>
        <a href="{{ route('form-kategori') }}">
            <div class="add-button">
                <div class="text-button">Tambah</div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M7.99998 3.33334V12.6667M3.33331 8.00001H12.6666" stroke="#F5F5F5" stroke-width="1.6"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
        </a>
    </div>
    <div class="table-container">
        <table class="table">
            <thead>
                <tr class="title-table">
                    <th class="favorite">Nama Kategori</th>
                    <th class="aksi">Aksi</th>
                </tr>
            </thead>
            <tbody class="inventory" id="category-table"></tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        loadTable();

        // Load data ke tabel
        function loadTable() {
            $.ajax({
                url: "{{ route('kategori_crud') }}",
                method: "GET",
                success: function (response) {
                    if (response.length > 0) {
                        let rows = '';
                        response.forEach(function (item) {
                            rows += `
                                <tr>
                                    <td>${item.name}</td>
                                    <td style="text-align: center;">
                                        <a href="{{ url('/form-kategori') }}?id=${item.id}"><img class="edit-icon" alt="" src="{{ asset('assets/image/edit-pencil.svg') }}" id="editIcon" /></a>
                                        <a href="" class="btn-delete" data-id="${item.id}"><img class="delete-icon" alt="" src="{{ asset('assets/image/delete.svg') }}" id="deleteIcon" /></a>
                                    </td>
                                </tr>
                            `;
                        });
                        $('#category-table').html(rows);
                    } else {
                        $('#category-table').html(`
                            <tr>
                                <td colspan="2" style="text-align: center;">Tidak ada data!</td>    
                            </tr>
                        `);
                    }
                }
            });
        }

        // Hapus data
        $(document).on('click', '.btn-delete', function (e) {
            e.preventDefault();
            const id = $(this).data('id');
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ya, Hapus ini!'
            }).then((result) => {
                if (result.value) {
                    showLoading();
                    $.ajax({
                        url: "{{ route('kategori_crud') }}",
                        method: "DELETE",
                        data: {
                            id: id,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function (response) {
                            hideLoading();
                            toastr.success(response.message,{
                                timeOut: 5000
                            });
                            loadTable();
                        },
                        error: function (xhr) {
                            hideLoading();
                            toastr.error("Gagal menghapus data.");
                        }
                    });
                }
            })
        });

        if (sessionStorage.getItem('successMessage')) {
            toastr.success(sessionStorage.getItem('successMessage'));
            sessionStorage.removeItem('successMessage');
        }
    });
</script>
@endsection
