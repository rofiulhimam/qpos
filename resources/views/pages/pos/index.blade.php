@extends('template')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/page/pos.css') }}" />
    <style>
        /* Modal overlay */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1000; 
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto; 
            background-color: rgba(0, 0, 0, 0.4);
            /* justify-content: center;
            align-items: center; */
        }

        /* Modal content */
        .modal-content {
            display: flex;
            flex-direction: column;
            background-color: #fefefe;
            margin: 15% auto; 
            padding: 5px 20px 20px 20px;
            border: none;
            width: 30%; 
            border-radius: 12px;
        }
        .modal-container {
            display: flex;
            padding: 20px 20px;
            flex-direction: column;
        }

        /* Center header */
        .modal-header {
            text-align: center; /* Center the header text */
            margin-bottom: 15px;
        }

        /* Style for buttons */
        .modal-body {
            display: flex;
            flex-direction: column; /* Stack buttons vertically */
            align-items: center; /* Center buttons horizontally */
            padding: 0 20px;
        }

        .modal-body button {
            background-color: var(--green-g300); /* Set background color */
            color: #fff;
            border: none;
            padding: 25px 20px;
            font-size: 16px;
            border-radius: 10px;
            cursor: pointer;
            margin: 5px 0; /* Add margin between buttons */
            width: 100%; /* Make buttons stretch */
        }

        .modal-body button:hover {
            background-color: rgb(8, 61, 8); /* Change color on hover */
        }

        /* Close button */
        .modal .close {
            color: #aaa;
            text-align: end;
            font-size: 25px;
            font-weight: 600;
            cursor: pointer;
        }

        .modal .close:hover,
        .modal .close:focus {
            color: #000;
            text-decoration: none;
        }
        .modal .close-nominal {
            color: #aaa;
            text-align: end;
            font-size: 25px;
            font-weight: 600;
            cursor: pointer;;
        }

        .modal .close-nominal:hover,
        .modal .close-nominal:focus {
            color: #000;
            text-decoration: none;
        }

        /* CSS untuk tabel di modal struk */
        .modal-header table,
        .modal-body table,
        .modal-footer table {
            width: 100%; /* Pastikan tabel mengisi lebar modal */
            border-collapse: collapse; /* Menghilangkan jarak antara sel */
            border: none; /* Tambahkan border pada tabel */
            margin: 0 auto; /* Pusatkan tabel */
        }

        .modal-header,
        .modal-body,
        .modal-footer {
            padding: 0; /* Hapus padding pada bagian modal */
            margin: 0; /* Hapus margin pada bagian modal */
        }

        .modal-header td,
        .modal-body td,
        .modal-footer td {
            padding: 0; /* Hapus padding pada sel */
            font-size: 14px; /* Ukuran font */
            border: none; /* Tambahkan border pada sel */
        }

        /* Rata kiri untuk kolom pertama */
        .modal-header td:first-child,
        .modal-body td:first-child,
        .modal-footer td:first-child {
            text-align: left; /* Rata kiri */
        }

        /* Rata kanan untuk kolom kedua */
        .modal-header td:last-child,
        .modal-body td:last-child,
        .modal-footer td:last-child {
            text-align: right; /* Rata kanan */
        }

        /* Rata tengah untuk kolom menu */
        .modal-body td:nth-child(2) {
            text-align: start; /* Rata tengah untuk kolom menu */
        }
        .modal-body td:first-child {
            width: 9%; /* Rata tengah untuk kolom menu */
        }
    </style>    
@endpush

@section('title')
POS    
@endsection

@section('more-header')
<div class="aside-header">
    <div class="aside-header-content">
        <div class="icon-order-detail">
            <img class="clipboard-icon" alt="" src="{{ asset('assets/image/clipboard.svg') }}" />
        </div>
        <div class="order-detail">
            <div class="title">Order Menu</div>
            <div class="order-number">Order No. 16</div>
        </div>
        <div class="delete-menu-order">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path
                    d="M14 10V17M10 10V17M6 6V17.8C6 18.9201 6 19.4798 6.21799 19.9076C6.40973 20.2839 6.71547 20.5905 7.0918 20.7822C7.5192 21 8.07899 21 9.19691 21H14.8031C15.921 21 16.48 21 16.9074 20.7822C17.2837 20.5905 17.5905 20.2839 17.7822 19.9076C18 19.4802 18 18.921 18 17.8031V6M6 6H8M6 6H4M8 6H16M8 6C8 5.06812 8 4.60241 8.15224 4.23486C8.35523 3.74481 8.74432 3.35523 9.23438 3.15224C9.60192 3 10.0681 3 11 3H13C13.9319 3 14.3978 3 14.7654 3.15224C15.2554 3.35523 15.6447 3.74481 15.8477 4.23486C15.9999 4.6024 16 5.06812 16 6M16 6H18M18 6H20"
                    stroke="#8A8A8A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </div>
    </div>
    <div class="divider"></div>
</div>
@endsection

@section('main-content')
<div class="main-content">
    <div class="menu-container">
        @foreach ($inventories as $item)
        <div class="menu-card" data-id="{{ $item->id }}" data-name="{{ $item->name }}" data-price="{{ $item->price }}">
            <div class="image">
                <img class="image-5-icon" alt="" src="{{ asset('image/inventory/'.$item->image) }}" style="max-width:100%; height:auto;" />
            </div>
            <div class="information">
                <div class="name-menu">{{ $item->name }}</div>
                <div class="price-menu">Rp {{ number_format($item->price, 0, ',', '.') }}</div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection

@section('more-content')
<aside class="right-page">
    <form role="form" id="form" enctype="multipart/form-data" style="display: contents">
        <input type="hidden" id="id" name="id" value="">
        <div class="aside-body">
            <div class="menu-order-container">
                <input type="hidden" id="id" name="id" value="[]">
                <input type="hidden" id="id" name="id" value="[]">
            </div>
        </div>
        <div class="aside-footer">
            <div class="divider"></div>
            <div class="aside-footer-container">
                <div class="text-info">
                    <div class="qty-total">0 Item</div>
                    <input type="hidden" id="qty_total" name="qty_total" value="">
                    <div class="price-total">Rp 0</div>
                    <input type="hidden" id="price_total" name="price_total" value="">
                </div>
                <div class="button-order">
                    <button type="button" class="button" id="orderButton">Order</button>
                </div>
            </div>
        </div>
    </form>
</aside>

<!-- Modal for payment method -->
<div id="metode-pembayaran" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="modal-container">
            <div class="modal-header">
                <h2>Metode Pembayaran</h2>
            </div>
            <div class="modal-body">
                <button type="button" id="cash">Tunai</button>
                <button type="button" id="cashless">Non Tunai</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for input nominal -->
<div id="input-nominal" class="modal">
    <div class="modal-content">
        <span class="close-nominal">&times;</span>
        <div class="modal-container">
            <div class="modal-body">
                <div class="title" style="display: flex; width: 100%; align-items: center; margin-bottom: 10px;">
                    <img src="{{ asset('assets/image/calculator.svg') }}" alt="" style="margin-right: 10px;"/>
                    <div style="font-size: 18px;">Masukkan Nominal</div>
                </div>
                <input type="text" id="nominal" placeholder="Rp 0" style="font-size: 14px; font-family: poppins; width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; margin-bottom: 30px; box-sizing: border-box;" />
            </div>
            <div class="modal-footer" style="display: flex; width: 100%;">
                <button type="button" id="submitNominal" style="background-color: var(--green-g300); width: 100%; color: white; border: none; padding: 10px; border-radius: 8px; margin: 0px 20px;">Bayar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for receipt -->
<div id="receipt-modal" class="modal">
    <div class="modal-content">
        <span class="close-receipt">&times;</span>
        <div class="modal-container">
            <div class="modal-header" style="padding: 0px">
                <h3>Kedai Kopi Kongsi</h3>
                <table>
                    <tbody>
                        <tr>
                            <td>No inv:</td>
                            <td><span id="invoice-number"></span></td>
                        </tr>
                        <tr>
                            <td>Waktu:</td>
                            <td><span id="invoice-time"></span></td>
                        </tr>
                        <tr>
                            <td>Kasir:</td>
                            <td><span id="cashier-name"></span></td>
                        </tr>
                    </tbody>
                </table>
                <div style="text-align: center">-----------------------------------------</div>
            </div>
            <div class="modal-body" id="receipt-body" style="padding: 0px">
                <table>
                    <tbody>
                        {{-- Item pesanan akan ditambahkan di sini --}}
                    </tbody>
                </table>
                <div style="text-align: center">-----------------------------------------</div>
            </div>
            <div class="modal-footer" style="padding: 0px">
                <table>
                    <tbody>
                        <tr>
                            <td>Subtotal:</td>
                            <td><span id="subtotal"></span></td>
                        </tr>
                        <tr>
                            <td>Total Tagihan:</td>
                            <td><span id="total-bill"></span></td>
                        </tr>
                    </tbody>
                </table>
                <div style="text-align: center">-----------------------------------------</div> 
                <table>
                    <tbody>
                        <tr>
                            <td>Total Bayar:</td>
                            <td><span id="total-paid"></span></td>
                        </tr>
                        <tr>
                            <td>Kembalian</td>
                            <td><span id="change"></span></td>
                        </tr>
                    </tbody>
                </table> 
                <div style="text-align: center">===============================</div>
                <p style="text-align: center">Selamat Menikmati</p> 
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuCards = document.querySelectorAll('.menu-card');
        const menuOrderContainer = document.querySelector('.menu-order-container');
        const deleteMenuOrder = document.querySelector('.delete-menu-order');
        const qtyTotal = document.querySelector('.qty-total');
        const priceTotal = document.querySelector('.price-total');

        const orderForm = document.querySelector('#form');
        const inputQtyTotal = document.querySelector('#qty_total');
        const inputPriceTotal = document.querySelector('#price_total');

        // Fungsi untuk memperbarui ringkasan total qty dan harga
        function updateSummary() {
            let totalQty = 0;
            let totalPrice = 0;

            menuOrderContainer.querySelectorAll('.menu-order').forEach(orderItem => {
                const qty = parseInt(orderItem.querySelector('.input-qty .div').textContent);
                const price = parseInt(orderItem.querySelector('.menu-selected .price').textContent.replace(/[^\d]/g, ''));

                totalQty += qty;
                totalPrice += price;
            });

            inputQtyTotal.value = totalQty;
            inputPriceTotal.value = totalPrice;

            qtyTotal.textContent = `${totalQty} Item`;
            priceTotal.textContent = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
            }).format(totalPrice);
        }

        // Fungsi untuk menangani penambahan dan pengurangan qty serta perhitungan harga
        function handleQtyButtons(menuOrderElement, basePrice) {
            const minusBtn = menuOrderElement.querySelector('.button-minus');
            const plusBtn = menuOrderElement.querySelector('.button-plus');
            const qtyInput = menuOrderElement.querySelector('.input-qty .div');
            const priceElement = menuOrderElement.querySelector('.menu-selected .price');

            let quantity = parseInt(qtyInput.textContent);

            function updatePrice() {
                const totalPrice = basePrice * quantity;
                priceElement.textContent = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0,
                }).format(totalPrice);
                updateSummary(); // Perbarui ringkasan setiap kali harga diperbarui
            }

            minusBtn.addEventListener('click', () => {
                if (quantity > 1) {
                    quantity--;
                    qtyInput.textContent = quantity;
                    updatePrice();
                }
            });

            plusBtn.addEventListener('click', () => {
                quantity++;
                qtyInput.textContent = quantity;
                updatePrice();
            });

            updatePrice();
        }

        // Fungsi untuk menemukan elemen berdasarkan nama
        function findMenuOrderByName(name) {
            return Array.from(menuOrderContainer.children).find(orderItem => {
                const nameElement = orderItem.querySelector('.name');
                if (nameElement) {
                    return nameElement.textContent === name;
                }
                return false;
            });
        }

        // Event listener untuk menu-card
        menuCards.forEach(card => {
            card.addEventListener('click', () => {
                const id_product = card.getAttribute('data-id');
                const name = card.getAttribute('data-name');
                const price = parseInt(card.getAttribute('data-price'));
                const formattedPrice = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0,
                }).format(price);

                const existingOrder = findMenuOrderByName(name);

                if (existingOrder) {
                    Swal.fire({
                        type: 'warning',
                        title: 'Item Sudah Ada!',
                        text: `Item "${name}" sudah ada dalam daftar pesanan.`,
                        confirmButtonText: 'OK'
                    });
                } else {
                    // Jika item belum ada, tambahkan elemen baru
                    const orderItem = document.createElement('div');
                    orderItem.classList.add('menu-order');
                    orderItem.setAttribute('data-id', id_product);
                    orderItem.innerHTML = `
                        <div class="menu-selected">
                            <div class="name">${name}</div>
                            <div class="price">${formattedPrice}</div>
                            <div class="notes">
                                <img class="icon-notes" alt="" src="{{ asset('assets/image/edit.svg') }}" />
                                <div class="text-notes">No Notes</div>
                            </div>
                        </div>
                        <div class="qty-option">
                            <a class="button-minus">
                                <img class="minus-icon" alt="" src="{{ asset('assets/image/Minus.png') }}" />
                            </a>
                            <div class="input-qty">
                                <div class="div">1</div>
                            </div>
                            <a class="button-plus">
                                <img class="minus-icon" alt="" src="{{ asset('assets/image/Plus.png') }}" />
                            </a>
                        </div>
                    `;

                    menuOrderContainer.appendChild(orderItem);

                    handleQtyButtons(orderItem, price);
                    updateSummary(); // Perbarui ringkasan setelah menambahkan item
                }
            });
        });

        // Event listener untuk delete-menu-order
        deleteMenuOrder.addEventListener('click', () => {
            menuOrderContainer.innerHTML = ''; // Menghapus semua elemen di dalam menuOrderContainer
            updateSummary(); // Reset ringkasan setelah semua item dihapus
        });

        orderForm.addEventListener('submit', function(e) {
            e.preventDefault();

            let items = [];
            menuOrderContainer.querySelectorAll('.menu-order').forEach(orderItem => {
                const id_product = orderItem.getAttribute('data-id');
                const qty = parseInt(orderItem.querySelector('.input-qty .div').textContent);
                items.push({
                    id_product: id_product,
                    qty: qty,
                });
            });

            const data = {
                qty_total: parseInt(inputQtyTotal.value) || 0,
                price_total: parseInt(priceTotal.textContent.replace(/[^\d]/g, '')) || 0,
                items: items
            };

            fetch('{{ route('transactions.store') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(result => {
                Swal.fire({
                    type: 'success',
                    title: 'Transaksi Berhasil',
                    text: result.message
                });
                menuOrderContainer.innerHTML = ''; // Bersihkan pesanan
                document.querySelector('.qty-total').textContent = '0 Item';
                document.querySelector('.price-total').textContent = 'Rp 0';

                // Show receipt after successful order submission
                showReceipt();
            })
            .catch(error => {
                Swal.fire({
                    type: 'error',
                    title: 'Gagal',
                    text: 'Terjadi kesalahan saat menyimpan transaksi'
                });
                console.error('Error:', error);
            });
        });

        const orderButton = document.getElementById('orderButton');
        const paymentModal = document.getElementById('metode-pembayaran');
        const closeModal = paymentModal.querySelector('.close');

        // Event listener untuk tombol Order
        orderButton.addEventListener('click', function() {
            paymentModal.style.display = 'block'; // Tampilkan modal metode pembayaran
        });

        // Event listener untuk tombol Cash
        document.getElementById('cash').addEventListener('click', function() {
            paymentModal.style.display = 'none'; // Tutup modal metode pembayaran
            document.getElementById('input-nominal').style.display = 'block'; // Tampilkan modal input nominal
        });

        // Event listener untuk tombol Bayar
        document.getElementById('submitNominal').addEventListener('click', function() {
            const nominalValue = document.getElementById('nominal').value.replace(/[^0-9]/g, ''); // Ambil nilai numerik
            if (nominalValue) {
                // Proses nilai nominal
                console.log('Nominal:', nominalValue);
                document.getElementById('input-nominal').style.display = 'none'; // Tutup modal input nominal

                // Tampilkan struk setelah pembayaran
                showReceipt(parseInt(nominalValue)); // Panggil fungsi showReceipt dengan total yang dibayarkan
            } else {
                alert('Silakan masukkan nominal yang valid.');
            }
        });

        // Fungsi untuk menampilkan struk
        function showReceipt(totalPaid) {
            const receiptModal = document.getElementById('receipt-modal');
            const invoiceNumber = document.getElementById('invoice-number');
            const invoiceTime = document.getElementById('invoice-time');
            const cashierName = document.getElementById('cashier-name');
            const receiptBody = document.getElementById('receipt-body');
            const subtotalElement = document.getElementById('subtotal');
            const totalBillElement = document.getElementById('total-bill');
            const totalPaidElement = document.getElementById('total-paid');
            const changeElement = document.getElementById('change');

            // Set invoice details
            invoiceNumber.textContent = Math.floor(Math.random() * 1000000); // Generate random invoice number
            invoiceTime.textContent = new Date().toLocaleString(); // Current time
            cashierName.textContent = "Nama Kasir"; // Replace with actual cashier name

            // Clear previous receipt items
            const tbody = receiptBody.querySelector('tbody');
            tbody.innerHTML = ''; // Clear previous items

            // Calculate subtotal and total bill
            let subtotal = 0;
            menuOrderContainer.querySelectorAll('.menu-order').forEach(orderItem => {
                const qty = parseInt(orderItem.querySelector('.input-qty .div').textContent);
                const name = orderItem.querySelector('.name').textContent;
                const price = parseInt(orderItem.querySelector('.menu-selected .price').textContent.replace(/[^\d]/g, ''));

                // Calculate total price for this item
                const totalPriceForItem = qty * price;

                // Add to subtotal
                subtotal += totalPriceForItem;

                // Add item to receipt table
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${qty}</td>
                    <td>${name}</td>
                    <td>${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(totalPriceForItem)}</td>
                `;
                tbody.appendChild(row);
            });

            // Set totals
            subtotalElement.textContent = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(subtotal);
            totalBillElement.textContent = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(subtotal);
            totalPaidElement.textContent = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(totalPaid);
            changeElement.textContent = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(totalPaid - subtotal);

            // Show the receipt modal
            receiptModal.style.display = 'block';
        }

        // Event listener for closing the receipt modal
        document.querySelector('.close-receipt').addEventListener('click', function() {
            document.getElementById('receipt-modal').style.display = 'none';
        });

        // Close modal for payment method
        closeModal.addEventListener('click', function() {
            paymentModal.style.display = 'none';
        });

        // Close modal for input nominal
        document.querySelector('.close-nominal').addEventListener('click', function() {
            document.getElementById('input-nominal').style.display = 'none';
        });

        // Close modal when clicking outside of the modal
        window.addEventListener('click', function(event) {
            if (event.target === paymentModal) {
                paymentModal.style.display = 'none';
            } else if (event.target === document.getElementById('input-nominal')) {
                document.getElementById('input-nominal').style.display = 'none';
            } else if (event.target === document.getElementById('receipt-modal')) {
                document.getElementById('receipt-modal').style.display = 'none';
            }
        });
    });
</script>
@endsection