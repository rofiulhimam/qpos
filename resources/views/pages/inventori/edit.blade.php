@extends('template')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/page/edit-inventori.css') }}" />
@endpush

@section('title')
    Tambah Inventori
@endsection

@section('more-content')
    <div class="main-content">
        <div class="top">
            <div class="title">Edit Produk</div>
            <div class="button">
                <button class="text-wrapper">Batal</button>
            </div>
        </div>
        <div class="container">
            <div class="content-container">
                <div class="left-content">
                    <div class="div">Gambar Produk</div>
                    <div class="flexcontainer">
                        <p class="p">
                            <span class="span">Gunakan foto terbaik untuk produk ini.<br />(format .JPG
                                .JPEG .PNG max 1 MB)</span>
                        </p>
                    </div>
                </div>
                <div class="edit-image">
                    <div class="input-image">
                        <img class="product-preview" src="{{ asset('assets/image/image-menu.png') }}" alt="Product Preview" />
                    </div>
                    <div class="button">
                        <button class="text-wrapper">Ganti foto</button>
                    </div>
                </div>
            </div>
            <div class="content-container">
                <div class="left-content">
                    <div class="div">Nama Produk</div>
                    <p class="p">
                        Tulis nama produk sesuai jenis, merek, dan rincian produk
                    </p>
                </div>
                <div class="field">
                    <input type="text" class="placeholder" placeholder="Masukkan nama produk"
                        style="
              border: none;
              background: transparent;
              width: 100%;
              outline: none;
            " />
                </div>
            </div>
            <div class="content-container">
                <div class="left-content">
                    <div class="div">Kategori Produk</div>
                    <p class="p">Pilih dari yang ada atau tambahkan yang baru</p>
                </div>
                <select class="field select-field">
                    <option value="" disabled selected>Pilih salah satu</option>
                    <option value="coffee">Coffee</option>
                    <option value="non-coffee">Non coffee</option>
                    <option value="mojito">Mojito</option>
                    <option value="pastry">Pastry & Snack</option>
                </select>
            </div>
            <div class="content-container">
                <div class="left-content">
                    <div class="div">Lacak Inventori</div>
                    <p class="p">
                        Jika anda mengaktifkan lacak inventori, sistem akan mengecek
                        ketersediaan stok barang sebelum menjual ke pembeli
                    </p>
                </div>
                <label class="switch">
                    <input type="checkbox" id="trackInventory" />
                    <span class="slider round"></span>
                </label>
            </div>
            <div class="content-container">
                <div class="left-content">
                    <div class="div">Jumlah Stok yang Tersedia</div>
                    <p class="p">
                        Sistem akan mengecek ketersediaan stok barang sebelum menjual ke
                        pembeli
                    </p>
                </div>
                <div class="field">
                    <input type="number" class="placeholder" placeholder="Masukkan angka, contoh: 1234"
                        style="
              border: none;
              background: transparent;
              width: 100%;
              outline: none;
            " />
                </div>
            </div>
            <div class="content-container">
                <div class="left-content">
                    <div class="div">Harga Produk</div>
                    <p class="p">Harga jual per satuan produk</p>
                </div>
                <div class="field">
                    <input type="text" class="placeholder" placeholder="Masukkan harga produk"
                        onfocus="if(!this.value) this.value='Rp '" onblur="if(this.value==='Rp ') this.value=''"
                        oninput="
              let value = this.value.replace(/\D/g, '');
              if(value) {
                value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                this.value = 'Rp ' + value;
              }
            "
                        style="
              border: none;
              background: transparent;
              width: 100%;
              outline: none;
            " />
                </div>
            </div>
        </div>
        <div class="button-bottom">
            <div class="button">
                <button class="text-wrapper">Simpan</button>
            </div>
        </div>
    </div>
@endsection
