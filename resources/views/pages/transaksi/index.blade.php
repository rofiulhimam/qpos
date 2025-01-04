@extends('template')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/page/transaksi.css') }}" />
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
        }

        /* Modal content */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 30%; 
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Close button */
        .modal .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .modal .close:hover,
        .modal .close:focus {
            color: #000;
            text-decoration: none;
        }

        .modal-header {
            margin-bottom: 15px;
        }

        .modal-body input[type="date"] {
            width: 100%;
            padding: 10px 0;
            font-size: 16px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .modal-footer {
            margin-top: 15px;
            text-align: right;
        }

        .modal-footer button {
            background-color: var(--green-g300);
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 10px;
            cursor: pointer;
        }

        .modal-footer button:hover {
            background-color: var(--green-g300);
        }
    </style>
@endpush

@section('title')
    Transaksi
@endsection

@section('more-header')
    <div class="aside-header">
        <div class="aside-header-content">
            <div class="text">Detail Transaksi</div>
            <img class="more-vertical-icon" alt="" src="{{ asset('assets/image/More_Vertical.svg') }}" />
        </div>
        <div class="divider"></div>
    </div>
@endsection

@section('main-content')
    <div class="main-content">
        <div class="main-title">
            <div class="text-title">Data Transaksi</div>
            <div class="button">
                <div class="icon-button" id="iconButtonCalendar">
                    <img class="calendar-calendar-days" alt=""
                        src="{{ asset('assets/image/Calendar_Days.svg') }}" />
                </div>
                <div class="icon-button" id="iconButtonFilter">
                    <img class="icon-jam-icons-filled-fi" alt="" src="{{ asset('assets/image/filter-f.svg') }}" />
                </div>
            </div>
        </div>

        @php
            $currentDate = now(); // Tanggal saat ini
        @endphp

        <div id="item-display">
        @foreach ($transactions as $date => $dailyTransactions)
            <div class="transaction-container">
                <div class="date">{{ \Carbon\Carbon::parse($date)->translatedFormat('d F Y') }}</div>
                <div class="transaction-content">
                    @foreach ($dailyTransactions as $transaction)
                        <div class="transaction" data-id="{{ $transaction->id }}">
                            <div class="text-left">
                                <div class="price-transaction">Rp {{ number_format($transaction->total_price, 0, ',', '.') }} - {{ $transaction->payment_method }}</div>
                                <div class="item-transaction">{{ $transaction->total_qty }} Item</div>
                            </div>
                            <div class="time">{{ $transaction->created_at->format('H:i') }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
        </div>
    </div>

    <div id="calendarModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="modal-header">
                <h2>Pilih Tanggal</h2>
            </div>
            <div class="modal-body" style="display: flex; align-items: center;">
                <input type="date" id="calendarInputFirst" style="padding: 10px; margin: 5px; font-family: 'Poppins', sans-serif;" />
                <div id="strip" style="display: none"> - </div>
                <input type="date" id="calendarInputLast" style="display: none; padding: 10px; margin: 5px; font-family: 'Poppins', sans-serif;" />
            </div>
            <div>
                <input type="checkbox" id="toggleRange" style="accent-color: var(--green-g300);" />
                <label for="toggleRange">Rentang Waktu</label>
            </div>
            <div class="modal-footer">
                <button id="calendarSubmit">Pilih</button>
            </div>
        </div>
    </div>
@endsection

@section('more-content')
    <aside class="right-page">
        <div class="aside-body">
            <div class="invoice-info">
                <div class="invoice-info-container">
                    <div class="textinvoice-container">
                        <div class="inv-info" id="inv-no">
                            <div class="title">Inv No</div>
                            <div class="output">-</div>
                            <input type="hidden" name="id_transaction" id="id_transaction" value="">
                        </div>
                        <div class="inv-info" id="cashier">
                            <div class="title">Cashier</div>
                            <div class="output">-</div>
                        </div>
                        <div class="inv-info" id="date">
                            <div class="title">Date</div>
                            <div class="output">-</div>
                        </div>
                        <div class="inv-info" id="pembayaran">
                            <div class="title">Pembayaran</div>
                            <div class="output">-</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu-order-info">
                <div>Silahkan pilih transaksi</div>
            </div>
        </div>
        <div class="aside-footer">
            <div class="divider"></div>
            <div class="aside-footer-container">
                <div class="text-info">
                    <div class="item">0 Item</div>
                    <div class="price-bottom">Rp 0</div>
                </div>
                <div class="button-print" id="btn-print">
                    <img class="printer-icon" alt="" src="{{ asset('assets/image/printer.svg') }}" />
                </div>
            </div>
        </div>
    </aside>
@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        function attachTransactionListeners() {
            const transactions = document.querySelectorAll('.transaction');

            transactions.forEach(transaction => {
                transaction.addEventListener('click', function () {
                    const transactionId = this.dataset.id;

                    // Hapus id="transaction_pressed" dari elemen sebelumnya
                    transactions.forEach(item => item.removeAttribute('id'));

                    // Tambahkan id="transaction_pressed" ke elemen yang diklik
                    this.setAttribute('id', 'transaction-pressed');

                    // Fetch detail transaksi menggunakan AJAX
                    fetch(`/transactions/${transactionId}`)
                        .then(response => response.json())
                        .then(data => {
                            // Update invoice-info
                            document.querySelector('#inv-no .output').innerText = `#${data.invoice_number}`;
                            document.querySelector('#inv-no #id_transaction').value = `${data.invoice_number}`;
                            document.querySelector('#cashier .output').innerText = data.cashier;
                            document.querySelector('#date .output').innerText = data.date;
                            document.querySelector('#pembayaran .output').innerText = data.payment_method;

                            // Update menu-order-info
                            const menuOrderContainer = document.querySelector('.menu-order-info');
                            menuOrderContainer.innerHTML = ''; // Kosongkan isi sebelumnya

                            data.items.forEach(item => {
                                menuOrderContainer.innerHTML += `
                                    <div class="menu-order">
                                        <div class="text-container">
                                            <div class="text-top">
                                                <div class="menu">${item.name}</div>
                                                <div class="price">Rp ${item.price.toLocaleString('id-ID')}</div>
                                            </div>
                                            <div class="text-bottom">
                                                <div class="item">${item.quantity}x</div>
                                                <div class="price-total">Rp ${(item.price * item.quantity).toLocaleString('id-ID')}</div>
                                            </div>
                                        </div>
                                    </div>
                                `;
                            });

                            // Update footer
                            document.querySelector('.aside-footer .item').innerText = `${data.total_items} Item`;
                            document.querySelector('.aside-footer .price-bottom').innerText = `Rp ${data.total_price.toLocaleString('id-ID')}`;
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
        }

        attachTransactionListeners();

        const calendarButton = document.getElementById('iconButtonCalendar');
        const calendarModal = document.getElementById('calendarModal');
        const closeModal = document.querySelector('.modal .close');
        const calendarSubmit = document.getElementById('calendarSubmit');
        const calendarInputFirst = document.getElementById('calendarInputFirst');
        const calendarInputLast = document.getElementById('calendarInputLast');
        const itemDisplay = document.getElementById('item-display');
        const toggleRange = document.getElementById('toggleRange');

        // Open modal
        calendarButton.addEventListener('click', function () {
            calendarModal.style.display = 'block';
        });

        // Close modal
        closeModal.addEventListener('click', function () {
            calendarModal.style.display = 'none';
        });

        // Close modal when clicking outside
        window.addEventListener('click', function (event) {
            if (event.target === calendarModal) {
                calendarModal.style.display = 'none';
            }
        });

        // Handle date selection
        calendarSubmit.addEventListener('click', function (e) {            
            const startDate = calendarInputFirst.value;
            const endDate = calendarInputLast.value;

            if (toggleRange.checked) {
                // Jika rentang waktu dicentang, pastikan kedua tanggal valid
                if (startDate && endDate && endDate > startDate) {
                    showLoading();
                    // Kirim filter menggunakan AJAX
                    fetch('/transactions/filter', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({ start_date: startDate, end_date: endDate })
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Kosongkan tampilan transaksi sebelumnya
                        itemDisplay.innerHTML = '';

                        if (Object.keys(data).length > 0) {
                            // Render data transaksi menggunakan template string
                            let htmlContent = '';
                            Object.entries(data).forEach(([date, transactions]) => {
                                htmlContent += `
                                    <div class="transaction-container">
                                        <div class="date">${new Date(date).toLocaleDateString('id-ID', {
                                            day: '2-digit',
                                            month: 'long',
                                            year: 'numeric'
                                        })}</div>
                                        <div class="transaction-content">
                                            ${transactions.map(transaction => `
                                                <div class="transaction" data-id="${transaction.id}">
                                                    <div class="text-left">
                                                        <div class="price-transaction">Rp ${parseInt(transaction.total_price).toLocaleString('id-ID')}</div>
                                                        <div class="item-transaction">${transaction.total_qty} Item</div>
                                                    </div>
                                                    <div class="time">${new Date(transaction.created_at).toLocaleTimeString('id-ID', {
                                                        hour: '2-digit',
                                                        minute: '2-digit'
                                                    })}</div>
                                                </div>
                                            `).join('')}
                                        </div>
                                    </div>
                                `;
                            });

                            // Masukkan HTML yang telah dibuat ke dalam item-display
                            itemDisplay.innerHTML = htmlContent;

                            // Tambahkan ulang event listener untuk transaksi
                            attachTransactionListeners();
                            
                        } else {
                            itemDisplay.innerHTML = '<div>Tidak ada transaksi untuk rentang tanggal ini.</div>';
                        }

                        hideLoading();
                        calendarModal.style.display = 'none';
                        calendarInputFirst.value = '';
                        calendarInputLast.value = '';
                    })
                    .catch(error => {
                        hideLoading();
                        console.error('Error:', error);
                    });
                } else {
                    Swal.fire({
                        title: 'Tanggal Tidak Valid!',
                        text: "Tanggal akhir tidak boleh lebih awal dari tanggal awal!",
                        type: 'error',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK!'
                    });
                }
            } else {
                // Jika hanya memilih satu tanggal
                if (startDate) {
                    showLoading();
                    // Kirim filter menggunakan AJAX untuk satu tanggal
                    fetch('/transactions/filter', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({ start_date: startDate, end_date: startDate }) // Kirim tanggal yang sama untuk start dan end
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Kosongkan tampilan transaksi sebelumnya
                        itemDisplay.innerHTML = '';

                        if (Object.keys(data).length > 0) {
                            // Render data transaksi menggunakan template string
                            let htmlContent = '';
                            Object.entries(data).forEach(([date, transactions]) => {
                                htmlContent += `
                                    <div class="transaction-container">
                                        <div class="date">${new Date(date).toLocaleDateString('id-ID', {
                                            day: '2-digit',
                                            month: 'long',
                                            year: 'numeric'
                                        })}</div>
                                        <div class="transaction-content">
                                            ${transactions.map(transaction => `
                                                <div class="transaction" data-id="${transaction.id}">
                                                    <div class="text-left">
                                                        <div class="price-transaction">Rp ${parseInt(transaction.total_price).toLocaleString('id-ID')}</div>
                                                        <div class="item-transaction">${transaction.total_qty} Item</div>
                                                    </div>
                                                    <div class="time">${new Date(transaction.created_at).toLocaleTimeString('id-ID', {
                                                        hour: '2-digit',
                                                        minute: '2-digit'
                                                    })}</div>
                                                </div>
                                            `).join('')}
                                        </div>
                                    </div>
                                `;
                            });

                            // Masukkan HTML yang telah dibuat ke dalam item-display
                            itemDisplay.innerHTML = htmlContent;

                            // Tambahkan ulang event listener untuk transaksi
                            attachTransactionListeners();
                            
                        } else {
                            itemDisplay.innerHTML = '<div>Tidak ada transaksi pada tanggal ini.</div>';
                        }

                        hideLoading();
                        calendarModal.style.display = 'none';
                        calendarInputFirst.value = '';
                        calendarInputLast.value = '';
                    })
                    .catch(error => {
                        hideLoading();
                        console.error('Error:', error);
                    });
                } else {
                    Swal.fire({
                        title: 'Tanggal Tidak Valid!',
                        text: "Silakan pilih tanggal!",
                        type: 'error',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK!'
                    });
                }
            }
        });

        // Event listener untuk checkbox rentang waktu
        toggleRange.addEventListener('change', function () {
            if (this.checked) {
                // Tampilkan input tanggal kedua
                calendarInputLast.style.display = 'block';
                strip.style.display = 'block'

            } else {
                // Sembunyikan input tanggal kedua
                strip.style.display = 'none'
                calendarInputLast.style.display = 'none';
                calendarInputLast.value = ''; // Reset nilai
            }
        });
    });

    // Cetak struk dari data yang dipilih
    $(document).ready(function () {
        $('#btn-print').on('click', function(e) {
            e.preventDefault();
            
            const id_transaction = $('#id_transaction').val();

            if (!id_transaction) {
                toastr.error("Silahkan pilih data transaksi terlebih dahulu sebelum dicetak!");
                return;
            }

            Swal.fire({
                title: 'Pemberitahuan',
                text: "Apakah anda ingin mencetak struk?",
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#31602c',
                confirmButtonText: 'Ya, cetak ini',
                cancelButtonColor: '#9A9A9A',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.value) {
                    window.open(`{{ route('struk_with_id') }}?id_transaction=${id_transaction}`);
                    Swal.close();
                }
            });
        });
    });
</script>
@endsection