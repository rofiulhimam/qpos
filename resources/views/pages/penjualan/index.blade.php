@extends('template')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/page/penjualan.css') }}" />
@endpush

@section('title')
    Penjualan
@endsection

@section('more-content')
    <div class="main-content">

        <div class="top">
            <div class="box-analysis">
                <div class="title">Hari ini</div>
                <div class="amount">54 Item</div>
                <div class="analysis">
                    <div class="percent" id="down">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 15.8333L10 4.16667M10 15.8333L15 10.8333M10 15.8333L5 10.8333" stroke="red"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="text"><b>16.7%</b></div>
                    </div>
                    <div class="period">dibandingkan kemarin</div>
                </div>
            </div>
            <div class="box-analysis">
                <div class="title">Bulan ini</div>
                <div class="amount">324 Item</div>
                <div class="analysis">
                    <div class="percent" id="up">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 4.16667L10 15.8333M10 4.16667L15 9.16667M10 4.16667L5 9.16667" stroke="green"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="text"><b>34.1%</b></div>
                    </div>
                    <div class="period">dibandingkan bulan lalu</div>
                </div>
            </div>
            <div class="box-analysis">
                <div class="title">Tahun ini</div>
                <div class="amount">1482 Item</div>
                <div class="analysis">
                    <div class="percent" id="up">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 4.16667L10 15.8333M10 4.16667L15 9.16667M10 4.16667L5 9.16667" stroke="green"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="text"><b>29.4%</b></div>
                    </div>
                    <div class="period">dibandingkan tahun lalu</div>
                </div>
            </div>
        </div>
        <div class="bottom">
            <div class="header-chart">
                <div class="div">Produk Terlaris</div>
                <div class="category">
                    <button class="button" id="unselected">Hari ini</button>
                    <button class="button" id="unselected">Minggu ini</button>
                    <button class="button" id="selected">Bulan ini</button>
                    <button class="button" id="unselected">Tahun ini</button>
                    <button class="button" id="selected" style="padding: 8px;">
                        <img class="icon" src="{{ asset('assets/image/Calendar.svg') }}" />
                    </button>
                </div>
            </div>
            <hr>
            <div class="table">
                <table class="tabel-produk">
                    <tr>
                        <td class="no">1.</td>
                        <td class="image">
                            <img class="avatar-icon" alt="" src="{{ asset('assets/image/image-menu.png') }}" />
                        </td>
                        <td class="name">Es Kopi Susu Aren Berlima</td>
                        <td class="price">Rp 28.000</td>
                        <td class="qty">243 terjual</td>
                    </tr>
                    <tr>
                        <td class="no">2.</td>
                        <td class="image">
                            <img class="avatar-icon" alt="" src="{{ asset('assets/image/image-menu2.png') }}" />
                        </td>
                        <td class="name">Vanilla iced shaken espresso
                        </td>
                        <td class="price">Rp 28.000</td>
                        <td class="qty">243 terjual</td>
                    </tr>
                    <tr>
                        <td class="no">3.</td>
                        <td class="image">
                            <img class="avatar-icon" alt="" src="{{ asset('assets/image/image-menu3.png') }}" />
                        </td>
                        <td class="name">Brown sugar fresh milk
                        </td>
                        <td class="price">Rp 28.000</td>
                        <td class="qty">243 terjual</td>
                    </tr>
                    <tr>
                        <td class="no">4.</td>
                        <td class="image">
                            <img class="avatar-icon" alt="" src="{{ asset('assets/image/image-menu4.png') }}" />
                        </td>
                        <td class="name">Pain Au Chocolate
                        </td>
                        <td class="price">Rp 28.000</td>
                        <td class="qty">243 terjual</td>
                    </tr>
                    <tr>
                        <td class="no">5.</td>
                        <td class="image">
                            <img class="avatar-icon" alt="" src="{{ asset('assets/image/image-menu.png') }}" />
                        </td>
                        <td class="name">Tropical Green</td>
                        <td class="price">Rp 28.000</td>
                        <td class="qty">243 terjual</td>
                    </tr>
                    <tr>
                        <td class="no">6.</td>
                        <td class="image">
                            <img class="avatar-icon" alt="" src="{{ asset('assets/image/image-menu2.png') }}" />
                        </td>
                        <td class="name">Sunset sparkle
                        </td>
                        <td class="price">Rp 28.000</td>
                        <td class="qty">243 terjual</td>
                    </tr>
                    <tr>
                        <td class="no">7.</td>
                        <td class="image">
                            <img class="avatar-icon" alt="" src="{{ asset('assets/image/image-menu3.png') }}" />
                        </td>
                        <td class="name">Es Kopi Susu Aren Berlima</td>
                        <td class="price">Rp 28.000</td>
                        <td class="qty">243 terjual</td>
                    </tr>
                    <tr>
                        <td class="no">8.</td>
                        <td class="image">
                            <img class="avatar-icon" alt="" src="{{ asset('assets/image/image-menu4.png') }}" />
                        </td>
                        <td class="name">Es Kopi Susu Aren Berlima</td>
                        <td class="price">Rp 28.000</td>
                        <td class="qty">243 terjual</td>
                    </tr>
                    <tr>
                        <td class="no">9.</td>
                        <td class="image">
                            <img class="avatar-icon" alt="" src="{{ asset('assets/image/image-menu.png') }}" />
                        </td>
                        <td class="name">Es Kopi Susu Aren Berlima</td>
                        <td class="price">Rp 28.000</td>
                        <td class="qty">243 terjual</td>
                    </tr>
                    <tr>
                        <td class="no">10.</td>
                        <td class="image">
                            <img class="avatar-icon" alt="" src="{{ asset('assets/image/image-menu.png') }}" />
                        </td>
                        <td class="name">Es Kopi Susu Aren Berlima</td>
                        <td class="price">Rp 28.000</td>
                        <td class="qty">243 terjual</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
