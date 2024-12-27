@extends('template')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/page/transaksi.css') }}" />
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
            <div class="text-title">Oktober 2024</div>
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
                                <div class="price-transaction">Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</div>
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
                <div class="button-print">
                    <img class="printer-icon" alt="" src="{{ asset('assets/image/printer.svg') }}" />
                </div>
            </div>
        </div>
    </aside>
@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
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
                        document.querySelector('#cashier .output').innerText = data.cashier;
                        document.querySelector('#date .output').innerText = data.date;
                        // document.querySelector('#pembayaran .output').innerText = data.payment_method;

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
    });
</script>
@endsection