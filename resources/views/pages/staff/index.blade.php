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
            <a href="{{ route('add-inventori') }}"><div class="add-button">
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
                        <th class="foto">Foto</th>
                        <th class="nama">Nama</th>
                        <th class="email">Email</th>
                        <th class="status">Status</th>
                        <th class="aksi">Aksi</th>
                    </tr>
                    <tr class="divider"></tr>
                </thead>
                <tbody class="inventory">
                    <tr class="title-table">
                        <td class="image">
                            <img class="avatar-icon" alt="" src="{{ asset('assets/image/image-menu.png') }}" />
                        </td>
                        <td class="nama">Annisa Isnaini Tsaniya</td>
                        <td class="email">nisaisnaini73@gmail.com</td>
                        <td class="status">Admin</td>
                        <td class="action">
                            <img class="delete-icon" alt="" src="{{ asset('assets/image/delete.svg') }}" id="deleteIcon" />
                        </td>
                    </tr>
                    <tr class="title-table">
                        <td class="image">
                            <img class="avatar-icon" alt="" src="{{ asset('assets/image/image-menu.png') }}" />
                        </td>
                        <td class="name">Rofi'ul Himam</td>
                        <td class="email">rofiulhimam@gmail.com</td>
                        <td class="status">Staff</td>
                        <td class="action">
                            <img class="delete-icon" alt="" src="{{ asset('assets/image/delete.svg') }}" id="deleteIcon" />
                        </td>
                    </tr>
                    <tr class="title-table">
                        <td class="image">
                            <img class="avatar-icon" alt="" src="{{ asset('assets/image/image-menu.png') }}" />
                        </td>
                        <td class="name">Aly  Rachman H</td>
                        <td class="email">alyrachman@gmail.com</td>
                        <td class="status">Staff</td>
                        <td class="action">
                            <img class="delete-icon" alt="" src="{{ asset('assets/image/delete.svg') }}" id="deleteIcon" />
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection