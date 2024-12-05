@extends('template')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/page/keuangan.css') }}" />
@endpush

@section('title')
    Keuangan
@endsection

@section('more-content')
    <div class="main-content">

        <div class="top">
            <div class="box-analysis">
                <div class="title">Hari ini</div>
                <div class="amount">Rp 347.000</div>
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
                <div class="amount">Rp 2.347.000</div>
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
                <div class="amount">Rp 35.347.000</div>
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
                <div class="div">Grafik Penghasilan</div>
                <div class="category">
                    <button class="button" id="unselected">Mingguan</button>
                    <button class="button" id="selected">Bulanan</button>
                    <button class="button" id="unselected">Tahunan</button>
                </div>
            </div>
            <hr>
            <div class="chart">
                <canvas id="monthlyChart"></canvas>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    const ctx = document.getElementById('monthlyChart');

                    const monthlyData = [
                        2347000, // 12 (Dec 2023)
                        2156000, // 1 (Jan 2024)
                        2987000, // 2 (Feb 2024)
                        2654000, // 3 (Mar 2024)
                        2876000, // 4 (Apr 2024)
                        2543000, // 5 (May 2024)
                        2987000, // 6 (Jun 2024)
                        3124000, // 7 (Jul 2024)
                        2765000, // 8 (Aug 2024)
                        2432000, // 9 (Sep 2024)
                        2654000, // 10 (Oct 2024)
                        2747000 // 11 (Nov 2024)
                    ];

                    const minValue = Math.min(...monthlyData);
                    const maxValue = Math.max(...monthlyData);

                    new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: ['Des', 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov'],
                            datasets: [{
                                label: 'Penghasilan Bulanan',
                                data: monthlyData,
                                borderColor: 'rgb(49, 96, 44)',
                                backgroundColor: 'rgba(49, 96, 44, 0.1)',
                                tension: 0,
                                fill: true
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            font: {
                                family: "'Poppins', sans-serif"
                            },
                            scales: {
                                y: {
                                    min: minValue * 0.95,
                                    max: maxValue * 1.05,
                                    ticks: {
                                        font: {
                                            family: "'Poppins', sans-serif"
                                        },
                                        callback: function(value) {
                                            return 'Rp ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                        }
                                    }
                                },
                                x: {
                                    ticks: {
                                        font: {
                                            family: "'Poppins', sans-serif"
                                        }
                                    }
                                }
                            },
                            plugins: {
                                tooltip: {
                                    titleFont: {
                                        family: "'Poppins', sans-serif"
                                    },
                                    bodyFont: {
                                        family: "'Poppins', sans-serif"
                                    },
                                    callbacks: {
                                        label: function(context) {
                                            let value = context.raw;
                                            return 'Rp ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                        }
                                    }
                                },
                                legend: {
                                    labels: {
                                        font: {
                                            family: "'Poppins', sans-serif"
                                        }
                                    }
                                }
                            }
                        }
                    });
                </script>
            </div>
        </div>
    </div>
@endsection
