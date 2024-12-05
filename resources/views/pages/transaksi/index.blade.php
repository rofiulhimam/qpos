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
        <div class="transaction-container">
            <div class="date">25 Oktober 2024</div>
            <div class="transaction-content">
                <div class="transaction" id="transaction-pressed">
                    <div class="text-left">
                        <div class="price-transaction">Rp 79.000 - CASH</div>
                        <div class="item-transaction">3 Item</div>
                    </div>
                    <div class="time">19.38</div>
                </div>
                <div class="transaction">
                    <div class="text-left">
                        <div class="price-transaction">Rp 79.000 - CASH</div>
                        <div class="item-transaction">3 Item</div>
                    </div>
                    <div class="time">19.38</div>
                </div>
                <div class="transaction">
                    <div class="text-left">
                        <div class="price-transaction">Rp 79.000 - QRIS</div>
                        <div class="item-transaction">3 Item</div>
                    </div>
                    <div class="time">19.38</div>
                </div>
                <div class="transaction">
                    <div class="text-left">
                        <div class="price-transaction">Rp 79.000 - BCA</div>
                        <div class="item-transaction">3 Item</div>
                    </div>
                    <div class="time">19.38</div>
                </div>
            </div>
        </div>
        <div class="transaction-container">
            <div class="date">26 Oktober 2024</div>
            <div class="transaction-content">
                <div class="transaction">
                    <div class="text-left">
                        <div class="price-transaction">Rp 79.000 - QRIS</div>
                        <div class="item-transaction">3 Item</div>
                    </div>
                    <div class="time">19.38</div>
                </div>
                <div class="transaction">
                    <div class="text-left">
                        <div class="price-transaction">Rp 80.000 - CASH</div>
                        <div class="item-transaction">3 Item</div>
                    </div>
                    <div class="time">19.38</div>
                </div>
                <div class="transaction">
                    <div class="text-left">
                        <div class="price-transaction">Rp 79.000 - CASH</div>
                        <div class="item-transaction">3 Item</div>
                    </div>
                    <div class="time">19.38</div>
                </div>
            </div>
        </div>
        <div class="transaction-container">
            <div class="date">27 Oktober 2024</div>
            <div class="transaction-content">
                <div class="transaction">
                    <div class="text-left">
                        <div class="price-transaction">Rp 79.000 - QRIS</div>
                        <div class="item-transaction">3 Item</div>
                    </div>
                    <div class="time">19.38</div>
                </div>
                <div class="transaction">
                    <div class="text-left">
                        <div class="price-transaction">Rp 80.000 - CASH</div>
                        <div class="item-transaction">3 Item</div>
                    </div>
                    <div class="time">19.38</div>
                </div>
                <div class="transaction">
                    <div class="text-left">
                        <div class="price-transaction">Rp 79.000 - CASH</div>
                        <div class="item-transaction">3 Item</div>
                    </div>
                    <div class="time">19.38</div>
                </div>
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
                            <div class="output">#33</div>
                        </div>
                        <div class="inv-info" id="cashier">
                            <div class="title">Cashier</div>
                            <div class="output">Annisa</div>
                        </div>
                        <div class="inv-info" id="date">
                            <div class="title">Date</div>
                            <div class="output">25/10/2024 - 19:38</div>
                        </div>
                        <div class="inv-info" id="pembayaran">
                            <div class="title">Pembayaran</div>
                            <div class="output">Cash</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu-order-info">
                <div class="menu-order">
                    <div class="text-container">
                        <div class="text-top">
                            <div class="menu">Es Kopi Susu Aren Berlima</div>
                            <div class="price">Rp 23.000</div>
                        </div>
                        <div class="text-bottom">
                            <div class="item">2x</div>
                            <div class="price-total">Rp 46.000</div>
                        </div>
                    </div>
                </div>
                <div class="menu-order">
                    <div class="text-container">
                        <div class="text-top">
                            <div class="menu">Es Kopi Susu Aren Berlima</div>
                            <div class="price">Rp 23.000</div>
                        </div>
                        <div class="text-bottom">
                            <div class="item">2x</div>
                            <div class="price-total">Rp 46.000</div>
                        </div>
                    </div>
                </div>
                <div class="menu-order">
                    <div class="text-container">
                        <div class="text-top">
                            <div class="menu">Es Kopi Susu Aren Berlima</div>
                            <div class="price">Rp 23.000</div>
                        </div>
                        <div class="text-bottom">
                            <div class="item">2x</div>
                            <div class="price-total">Rp 46.000</div>
                        </div>
                    </div>
                </div>
                <div class="menu-order">
                    <div class="text-container">
                        <div class="text-top">
                            <div class="menu">Es Kopi Susu Aren Berlima</div>
                            <div class="price">Rp 23.000</div>
                        </div>
                        <div class="text-bottom">
                            <div class="item">2x</div>
                            <div class="price-total">Rp 46.000</div>
                        </div>
                    </div>
                </div>
                <div class="menu-order">
                    <div class="text-container">
                        <div class="text-top">
                            <div class="menu">Es Kopi Susu Aren Berlima</div>
                            <div class="price">Rp 23.000</div>
                        </div>
                        <div class="text-bottom">
                            <div class="item">2x</div>
                            <div class="price-total">Rp 46.000</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="aside-footer">
            <div class="divider"></div>
            <div class="aside-footer-container">
                <div class="text-info">
                    <div class="item">5 Item</div>
                    <div class="price-bottom">Rp 79.000</div>
                </div>
                <div class="button-print">
                    <img class="printer-icon" alt="" src="{{ asset('assets/image/printer.svg') }}" />
                </div>
            </div>
        </div>
    </aside>
@endsection
