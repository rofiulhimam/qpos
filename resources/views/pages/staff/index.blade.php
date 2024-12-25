@extends('template')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/page/inventori.css') }}" />
@endpush

@section('title')
    Staff
@endsection

@section('main-content')
    <div class="main-content">
        <div class="button-header">
            <div class="left-button" style="font-size: 20px; color: var(--color-black); font-family: var(--body-body-s); font-weight: 600;">
                Manajemen Staff
            </div>
            <a href="{{ route('form-staff') }}"><div class="add-button">
                <div class="text-button">Tambah</div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M7.99998 3.33334V12.6667M3.33331 8.00001H12.6666" stroke="#F5F5F5" stroke-width="1.6"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div></a>
        </div>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr class="title-table">
                        <th class="nama">Nama</th>
                        <th class="email">Email</th>
                        <th class="status">Status</th>
                        <th class="aksi">Aksi</th>
                    </tr>
                    <tr class="divider"></tr>
                </thead>
                <tbody class="inventory" id="staff-table">
                </tbody>
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
                url: "{{ route('staff_crud') }}",
                method: "GET",
                success: function (response) {
                    if (response.length > 0) {
                        let rows = '';
                        response.forEach(function (item) {
                            rows += `
                                <tr>
                                    <td class="nama">${item.name}</td>
                                    <td class="email">${item.email}</td>
                                    <td class="status">${item.role}</td>
                                    <td style="text-align: center;" class="action">
                                        <a href="" class="btn-delete" data-id="${item.id}"><img class="delete-icon" alt="" src="{{ asset('assets/image/delete.svg') }}" id="deleteIcon" /></a>
                                    </td>
                                </tr>
                            `;
                        });
                        $('#staff-table').html(rows);
                    } else {
                        $('#staff-table').html(`
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
                        url: "{{ route('staff_crud') }}",
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