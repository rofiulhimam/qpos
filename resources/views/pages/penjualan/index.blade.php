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
                <div class="amount">{{ $today }} Item</div>
                <div class="analysis">
                    @if ($today < $yesterday)
                    <div class="percent" id="down">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 15.8333L10 4.16667M10 15.8333L15 10.8333M10 15.8333L5 10.8333" stroke="red"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="text"><b>{{ number_format(abs($percent_change_yesterday), 1, ',', '.') }}%</b></div>
                    </div>
                    @elseif ($today > $yesterday)
                    <div class="percent" id="up">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 4.16667L10 15.8333M10 4.16667L15 9.16667M10 4.16667L5 9.16667" stroke="green"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="text"><b>{{ number_format(abs($percent_change_yesterday), 1, ',', '.') }}%</b></div>
                    </div>
                    @endif
                    <div class="period">dibandingkan kemarin</div>
                </div>
            </div>
            <div class="box-analysis">
                <div class="title">Bulan ini</div>
                <div class="amount">{{ $this_month }} Item</div>
                <div class="analysis">
                    @if ($this_month < $last_month)
                    <div class="percent" id="down">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 15.8333L10 4.16667M10 15.8333L15 10.8333M10 15.8333L5 10.8333" stroke="red"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="text"><b>{{ number_format(abs($percent_change_last_month), 1, ',', '.') }}%</b></div>
                    </div>
                    @elseif ($this_month > $last_month)
                    <div class="percent" id="up">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 4.16667L10 15.8333M10 4.16667L15 9.16667M10 4.16667L5 9.16667" stroke="green"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="text"><b>{{ number_format(abs($percent_change_last_month), 1, ',', '.') }}%</b></div>
                    </div>
                    @endif
                    <div class="period">dibandingkan bulan lalu</div>
                </div>
            </div>
            <div class="box-analysis">
                <div class="title">Tahun ini</div>
                <div class="amount">{{ $this_year }} Item</div>
                <div class="analysis">
                    @if ($this_year < $last_year)
                    <div class="percent" id="down">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 15.8333L10 4.16667M10 15.8333L15 10.8333M10 15.8333L5 10.8333" stroke="red"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="text"><b>{{ number_format(abs($percent_change_last_year), 1, ',', '.') }}%</b></div>
                    </div>
                    @elseif ($this_year > $last_year)
                    <div class="percent" id="up">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 4.16667L10 15.8333M10 4.16667L15 9.16667M10 4.16667L5 9.16667" stroke="green"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="text"><b>{{ number_format(abs($percent_change_last_year), 1, ',', '.') }}%</b></div>
                    </div>
                    @endif
                    <div class="period">dibandingkan tahun lalu</div>
                </div>
            </div>
        </div>
        <div class="bottom">
            <div class="header-chart">
                <div class="div">Produk Terlaris</div>
                <div class="category">
                    <button class="button period-btn" id="unselected" data-period="today">Hari ini</button>
                    <button class="button period-btn" id="unselected" data-period="weekly">Minggu ini</button>
                    <button class="button period-btn" id="selected" data-period="monthly">Bulan ini</button>
                    <button class="button period-btn" id="unselected" data-period="yearly">Tahun ini</button>
                    <button class="button" id="selected" style="padding: 8px;">
                        <img class="icon" src="{{ asset('assets/image/Calendar.svg') }}" />
                    </button>
                </div>
            </div>
            <hr>
            <div class="table">
                <table class="tabel-produk">
                    <tbody id="table-content">
                        @foreach ($data_weekly as $item)
                        <tr>
                            <td class="no">1.</td>
                            <td class="image">
                                <img class="avatar-icon" alt="" src="{{ asset('image/inventory/'.$item->image) }}" />
                            </td>
                            <td class="name">{{ $item->name }}</td>
                            <td class="price">Rp {{ $item->price }}</td>
                            <td class="qty">{{$item->total_penjualan_produk}} terjual</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const buttons = document.querySelectorAll('.period-btn');
        const tableContent = document.getElementById('table-content');

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                const period = button.getAttribute('data-period');

                // Ubah tampilan tombol yang dipilih
                buttons.forEach(btn => btn.id = 'unselected');
                button.id = 'selected';

                // Fetch data dari server
                fetch(`/penjualan/data/${period}`)
                    .then(response => response.json())
                    .then(data => {
                        tableContent.innerHTML = ''; // Hapus konten lama

                        data.forEach((item, index) => {
                            tableContent.innerHTML += `
                                <tr>
                                    <td class="no">${index + 1}.</td>
                                    <td class="image">
                                        <img class="avatar-icon" alt="" src="/image/inventory/${item.image}" />
                                    </td>
                                    <td class="name">${item.name}</td>
                                    <td class="price">Rp ${item.price}</td>
                                    <td class="qty">${item.total_penjualan_produk} terjual</td>
                                </tr>
                            `;
                        });
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    });
</script>
@endsection
