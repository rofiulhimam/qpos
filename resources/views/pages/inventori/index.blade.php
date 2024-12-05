@extends('template')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/page/inventori.css') }}" />
@endpush

@section('title')
    Inventori
@endsection

@section('main-content')
    <div class="main-content">
        <div class="button-header">
            <div class="left-button">
                <div class="category-button" id="categoryButtonContainer">
                    <div class="text-button">Kategori</div>
                </div>
                <div class="category-button" id="stockButtonContainer">
                    <div class="text-button">Stok</div>
                </div>
            </div>
            <div class="add-button">
                <div class="text-button">Tambah</div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M7.99998 3.33334V12.6667M3.33331 8.00001H12.6666" stroke="#F5F5F5" stroke-width="1.6"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
        </div>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr class="title-table">
                        <th class="foto">Foto</th>
                        <th class="favorite">Nama Produk</th>
                        <th class="kategori">Kategori</th>
                        <th class="kategori">Stok</th>
                        <th class="harga">Harga</th>
                        <th class="aksi">Aksi</th>
                    </tr>
                    <tr class="divider"></tr>
                </thead>
                <tbody class="inventory">
                    <tr class="title-table">
                        <td class="image">
                            <img class="avatar-icon" alt="" src="{{ asset('assets/image/image-menu.png') }}" />
                        </td>
                        <td class="menu-name">Es Kopi Susu Aren Berlima</td>
                        <td class="category">Non Coffee</td>
                        <td class="category">Tersedia</td>
                        <td class="price">Rp 79.000</td>
                        <td class="action">
                            <img class="edit-icon" alt="" src="{{ asset('assets/image/edit-pencil.svg') }}" id="editIcon" />
                            <img class="delete-icon" alt="" src="{{ asset('assets/image/delete.svg') }}" id="deleteIcon" />
                        </td>
                    </tr>
                    <tr class="title-table">
                        <td class="image">
                            <img class="avatar-icon" alt="" src="{{ asset('assets/image/image-menu.png') }}" />
                        </td>
                        <td class="menu-name">Es Kopi Susu Aren Berlima</td>
                        <td class="category">Non Coffee</td>
                        <td class="category">Tersedia</td>
                        <td class="price">Rp 79.000</td>
                        <td class="action">
                            <img class="edit-icon" alt="" src="{{ asset('assets/image/edit-pencil.svg') }}" id="editEditPencil01" />
                            <img class="delete-icon" alt="" src="{{ asset('assets/image/delete.svg') }}" id="deleteIcon" />
                        </td>
                    </tr>
                    <tr class="title-table">
                        <td class="image">
                            <img class="avatar-icon" alt="" src="{{ asset('assets/image/image-menu.png') }}" />
                        </td>
                        <td class="menu-name">Es Kopi Susu Aren Berlima</td>
                        <td class="category">Non Coffee</td>
                        <td class="category">Tersedia</td>
                        <td class="price">Rp 79.000</td>
                        <td class="action">
                            <img class="edit-icon" alt="" src="{{ asset('assets/image/edit-pencil.svg') }}" id="editEditPencil01" />
                            <img class="delete-icon" alt="" src="{{ asset('assets/image/delete.svg') }}" id="deleteIcon" />
                        </td>
                    </tr>
                    <tr class="title-table">
                        <td class="image">
                            <img class="avatar-icon" alt="" src="{{ asset('assets/image/image-menu.png') }}" />
                        </td>
                        <td class="menu-name">Es Kopi Susu Aren Berlima</td>
                        <td class="category">Non Coffee</td>
                        <td class="category">Tersedia</td>
                        <td class="price">Rp 79.000</td>
                        <td class="action">
                            <img class="edit-icon" alt="" src="{{ asset('assets/image/edit-pencil.svg') }}" id="editEditPencil01" />
                            <img class="delete-icon" alt="" src="{{ asset('assets/image/delete.svg') }}" id="deleteIcon" />
                        </td>
                    </tr>
                    <tr class="title-table">
                        <td class="image">
                            <img class="avatar-icon" alt="" src="{{ asset('assets/image/image-menu.png') }}" />
                        </td>
                        <td class="menu-name">Es Kopi Susu Aren Berlima</td>
                        <td class="category">Non Coffee</td>
                        <td class="category">Tersedia</td>
                        <td class="price">Rp 79.000</td>
                        <td class="action">
                            <img class="edit-icon" alt="" src="{{ asset('assets/image/edit-pencil.svg') }}" id="editEditPencil01" />
                            <img class="delete-icon" alt="" src="{{ asset('assets/image/delete.svg') }}" id="deleteIcon" />
                        </td>
                    </tr>
                    <tr class="title-table">
                        <td class="image">
                            <img class="avatar-icon" alt="" src="{{ asset('assets/image/image-menu.png') }}" />
                        </td>
                        <td class="menu-name">Es Kopi Susu Aren Berlima</td>
                        <td class="category">Non Coffee</td>
                        <td class="category">Tersedia</td>
                        <td class="price">Rp 79.000</td>
                        <td class="action">
                            <img class="edit-icon" alt="" src="{{ asset('assets/image/edit-pencil.svg') }}" id="editEditPencil01" />
                            <img class="delete-icon" alt="" src="{{ asset('assets/image/delete.svg') }}" id="deleteIcon" />
                        </td>
                    </tr>
                    <tr class="title-table">
                        <td class="image">
                            <img class="avatar-icon" alt="" src="{{ asset('assets/image/image-menu.png') }}" />
                        </td>
                        <td class="menu-name">Es Kopi Susu Aren Berlima</td>
                        <td class="category">Non Coffee</td>
                        <td class="category">Tersedia</td>
                        <td class="price">Rp 79.000</td>
                        <td class="action">
                            <img class="edit-icon" alt="" src="{{ asset('assets/image/edit-pencil.svg') }}" id="editEditPencil01" />
                            <img class="delete-icon" alt="" src="{{ asset('assets/image/delete.svg') }}" id="deleteIcon" />
                        </td>
                    </tr>
                    <tr class="title-table">
                        <td class="image">
                            <img class="avatar-icon" alt="" src="{{ asset('assets/image/image-menu.png') }}" />
                        </td>
                        <td class="menu-name">Es Kopi Susu Aren Berlima</td>
                        <td class="category">Non Coffee</td>
                        <td class="category">Tersedia</td>
                        <td class="price">Rp 79.000</td>
                        <td class="action">
                            <img class="edit-icon" alt="" src="{{ asset('assets/image/edit-pencil.svg') }}" id="editEditPencil01" />
                            <img class="delete-icon" alt="" src="{{ asset('assets/image/delete.svg') }}" id="deleteIcon" />
                        </td>
                    </tr>
                    <tr class="title-table">
                        <td class="image">
                            <img class="avatar-icon" alt="" src="{{ asset('assets/image/image-menu.png') }}" />
                        </td>
                        <td class="menu-name">Es Kopi Susu Aren Berlima</td>
                        <td class="category">Non Coffee</td>
                        <td class="category">Tersedia</td>
                        <td class="price">Rp 79.000</td>
                        <td class="action">
                            <img class="edit-icon" alt="" src="{{ asset('assets/image/edit-pencil.svg') }}" id="editEditPencil01" />
                            <img class="delete-icon" alt="" src="{{ asset('assets/image/delete.svg') }}" id="deleteIcon" />
                        </td>
                    </tr>
                    <tr class="title-table">
                        <td class="image">
                            <img class="avatar-icon" alt="" src="{{ asset('assets/image/image-menu.png') }}" />
                        </td>
                        <td class="menu-name">Es Kopi Susu Aren Berlima</td>
                        <td class="category">Non Coffee</td>
                        <td class="category">Tersedia</td>
                        <td class="price">Rp 79.000</td>
                        <td class="action">
                            <img class="edit-icon" alt="" src="{{ asset('assets/image/edit-pencil.svg') }}" id="editEditPencil01" />
                            <img class="delete-icon" alt="" src="{{ asset('assets/image/delete.svg') }}" id="deleteIcon" />
                        </td>
                    </tr>
                    <tr class="title-table">
                        <td class="image">
                            <img class="avatar-icon" alt="" src="{{ asset('assets/image/image-menu.png') }}" />
                        </td>
                        <td class="menu-name">Es Kopi Susu Aren Berlima</td>
                        <td class="category">Non Coffee</td>
                        <td class="category">Tersedia</td>
                        <td class="price">Rp 79.000</td>
                        <td class="action">
                            <img class="edit-icon" alt="" src="{{ asset('assets/image/edit-pencil.svg') }}" id="editEditPencil01" />
                            <img class="delete-icon" alt="" src="{{ asset('assets/image/delete.svg') }}" id="deleteIcon" />
                        </td>
                    </tr>
                    <tr class="title-table">
                        <td class="image">
                            <img class="avatar-icon" alt="" src="{{ asset('assets/image/image-menu.png') }}" />
                        </td>
                        <td class="menu-name">Es Kopi Susu Aren Berlima</td>
                        <td class="category">Non Coffee</td>
                        <td class="category">Tersedia</td>
                        <td class="price">Rp 79.000</td>
                        <td class="action">
                            <img class="edit-icon" alt="" src="{{ asset('assets/image/edit-pencil.svg') }}" id="editEditPencil01" />
                            <img class="delete-icon" alt="" src="{{ asset('assets/image/delete.svg') }}" id="deleteIcon" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection