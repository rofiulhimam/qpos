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
        <div class="title">Tambah Produk</div>
        <a href="{{ route('inventori') }}">
            <div class="button">
                <button>Batal</button>
            </div>
        </a>
    </div>
    <form role="form" id="form" enctype="multipart/form-data">
        <div class="container">
            <div class="content-container">
                <input type="hidden" name="metode" id="metode" value="tambah">
                <input type="hidden" id="id" name="id" value="">
                <div class="left-content">
                    <div class="div">Gambar Produk</div>
                    <div class="flexcontainer">
                        <p class="p">
                            <span class="span">Gunakan foto terbaik untuk produk ini.<br />(format .JPG .JPEG .PNG max 1MB)</span>
                        </p>
                    </div>
                </div>
                <div class="input-image" style="cursor: pointer;">
                    <label for="image" style="display: flex; justify-content: center; align-items: center; width: 100%; height: 100%;">
                        <img id="image-preview" src="{{ asset('assets/image/Plus-grey.svg') }}" alt="Preview Gambar" style="max-width: 150px; max-height: 150px; margin: auto;">
                        <input type="file" id="image" name="image" accept=".jpg,.jpeg,.png" style="display: none;" />
                    </label>
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
                    <input type="text" class="placeholder" placeholder="Masukkan nama produk" style="border: none; background: transparent; width: 100%; outline: none;" name="name" id="name" value="">
                </div>
            </div>
            <div class="content-container">
                <div class="left-content">
                    <div class="div">Kategori Produk</div>
                    <p class="p">Pilih dari yang ada atau tambahkan yang baru</p>
                </div>
                <select class="field select-field" name="id_category" id="id_category">
                    <option value="" disabled selected>Pilih salah satu</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                    {{-- <option value="1">Coffee</option>
                    <option value="2">Non coffee</option>
                    <option value="3">Mojito</option>
                    <option value="4">Pastry & Snack</option> --}}
                </select>
            </div>
            <div class="content-container">
                <div class="left-content">
                    <div class="div">Stok</div>
                    <p class="p">
                        Silahkan menentukan apakah stok tersedia atau tidak.
                    </p>
                </div>
                <select class="field select-field" name="stock" id="stock">
                    <option value="" disabled selected>Pilih salah satu</option>
                    <option value="Tersedia">Tersedia</option>
                    <option value="Tidak Tersedia">Tidak Tersedia</option>
                </select>
            </div>
            <div class="content-container">
                <div class="left-content">
                    <div class="div">Harga Produk</div>
                    <p class="p">Harga jual per satuan produk</p>
                </div>
                <div class="field">
                    <input type="text" class="placeholder" id="price_display" value="" placeholder="Masukkan harga produk" style="border: none; background: transparent; width: 100%; outline: none;">
                    <input type="hidden" id="price" name="price" value="">
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
    // Fungsi untuk memformat angka ke format mata uang
    function formatCurrency(value) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
        }).format(value);
    }

    // Fungsi untuk menghapus karakter non-digit
    function parseCurrency(value) {
        return value.replace(/[^0-9]/g, '');
    }

    $(document).ready(function () {
        // Jika mode edit, ambil data kategori
        const urlParams = new URLSearchParams(window.location.search);
        const id = urlParams.get('id');
        if (id) {
            $('.title').html('Edit Produk');
            $('#metode').val('edit');
            $('#id').val(id);
            $.ajax({
                url: "{{ route('inventori_crud') }}",
                method: "GET",
                success: function (response) {
                    // console.log(response); // Cek apakah respons data sudah benar
                    
                    const data = response.find(item => item.id == id);
                    if (data) {
                        $('#name').val(data.name);
                        $('#stock').val(data.stock);
                        $('#price').val(data.price);
                        $('#id_category').val(data.id_category).trigger('change');
                        $('#image-preview').attr('src', "{{ asset('image/inventory/') }}" + '/' + data.image);
                        $('#price_display').val(formatCurrency(data.price));
                    } else {
                        toastr.error('Data tidak ditemukan!');
                    }
                },
                error: function () {
                    toastr.error('Gagal memuat data produk.');
                }
            });
        }

        $('#form').on('submit', function (e) {
            e.preventDefault();

            let formData = new FormData(this); // Gunakan FormData untuk menangani file
            formData.append('metode', $('#metode').val());
            formData.append('_token', "{{ csrf_token() }}");

            $.ajax({
                url: "{{ route('inventori_crud') }}",
                method: "POST",
                data: formData,
                contentType: false, // Wajib untuk FormData
                processData: false, // Wajib untuk FormData
                success: function (response) {
                    sessionStorage.setItem('successMessage', response.message);
                    window.location.href = "{{ route('inventori') }}";
                },
                error: function (xhr) {
                    toastr.error(xhr.responseJSON.message || "Gagal menyimpan data.");
                }
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        // Format Currency For Price //
        const priceDisplay = document.getElementById('price_display');
        const priceHidden = document.getElementById('price');

        

        // Event listener untuk memformat input harga saat mengetik
        priceDisplay.addEventListener('input', function (e) {
            const rawValue = parseCurrency(e.target.value);
            priceHidden.value = rawValue; // Simpan nilai integer di input hidden
            e.target.value = rawValue ? formatCurrency(rawValue) : '';
        });

        // Event listener untuk memformat ulang saat input kehilangan fokus
        priceDisplay.addEventListener('blur', function (e) {
            const rawValue = parseCurrency(e.target.value);
            e.target.value = rawValue ? formatCurrency(rawValue) : '';
        });

        // Jika dalam mode edit dan ada harga di hidden input
        if (priceHidden.value) {
            priceDisplay.value = formatCurrency(priceHidden.value);
        }
        // End of Format Currency For Price //

        // Preview Image Uploaded //
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('image-preview');

        // Event listener untuk menampilkan preview gambar
        imageInput.addEventListener('change', function () {
            const file = imageInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imagePreview.src = e.target.result; // Set preview gambar
                    imagePreview.style.objectFit = 'cover'; // Pastikan gambar mengisi kontainer dengan perbandingan ukuran yang tetap
                    imagePreview.style.width = '100%'; // Pastikan lebar gambar mengisi kontainer
                    imagePreview.style.height = '100%'; // Pastikan tinggi gambar mengisi kontainer
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = "{{ asset('assets/image/Plus-grey.svg') }}"; // Reset ke placeholder jika tidak ada file
                imagePreview.style.objectFit = 'cover'; // Pastikan gambar mengisi kontainer dengan perbandingan ukuran yang tetap
                imagePreview.style.width = '100%'; // Pastikan lebar gambar mengisi kontainer
                imagePreview.style.height = '100%'; // Pastikan tinggi gambar mengisi kontainer
            }
        });
        // End of Preview Image Uploaded //
    });
</script>
@endsection