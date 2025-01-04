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
                <div class="amount">Rp {{ number_format($today, 0, ',', '.') }}</div>
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
                <div class="amount">Rp {{ number_format($this_month, 0, ',', '.') }}</div>
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
                <div class="amount">Rp {{ number_format($this_year, 0, ',', '.') }}</div>
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
                <div class="div">Grafik Penghasilan</div>
                <div class="category">
                    <button class="button active" id="weeklyBtn">Mingguan</button>
                    <button class="button" id="monthlyBtn">Bulanan</button>
                    <button class="button" id="yearlyBtn">Tahunan</button>
                </div>
            </div>
            <hr>
            <div class="chart">
                <canvas id="financeChart"></canvas>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    const ctx = document.getElementById('financeChart').getContext('2d');

                    // Default Data (Bulanan)
                    let chartLabels = {!! json_encode($chart_labels) !!};
                    let chartValues = {!! json_encode($chart_values) !!};

                    // Data for Weekly and Yearly
                    const weeklyLabels = {!! json_encode($chart_labels_weekly) !!};
                    const weeklyValues = {!! json_encode($chart_values_weekly) !!};
                    const yearlyLabels = {!! json_encode($chart_labels_yearly) !!};
                    const yearlyValues = {!! json_encode($chart_values_yearly) !!};

                    let financeChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: chartLabels,
                            datasets: [{
                                label: 'Penghasilan Bulanan',
                                data: chartValues,
                                borderColor: 'rgb(49, 96, 44)',
                                backgroundColor: 'rgba(49, 96, 44, 0.1)',
                                tension: 0.4,
                                fill: true
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    ticks: {
                                        callback: function(value) {
                                            return 'Rp ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                        }
                                    }
                                }
                            },
                            plugins: {
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            return 'Rp ' + context.raw.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                        }
                                    }
                                }
                            }
                        }
                    });

                    // Button Click Events
                    document.getElementById('weeklyBtn').addEventListener('click', function() {
                        updateChart('Penghasilan Mingguan', weeklyLabels, weeklyValues);
                        setActiveButton(this);
                    });

                    document.getElementById('monthlyBtn').addEventListener('click', function() {
                        updateChart('Penghasilan Bulanan', chartLabels, chartValues);
                        setActiveButton(this);
                    });

                    document.getElementById('yearlyBtn').addEventListener('click', function() {
                        updateChart('Penghasilan Tahunan', yearlyLabels, yearlyValues);
                        setActiveButton(this);
                    });

                    
                    // Update Chart Function
                    function updateChart(label, labels, values) {
                        financeChart.data.labels = labels;
                        financeChart.data.datasets[0].label = label;
                        financeChart.data.datasets[0].data = values;
                        financeChart.update();
                    }

                    // Set Active Button Function
                    function setActiveButton(activeButton) {
                        const buttons = document.querySelectorAll('.button');
                        buttons.forEach(button => {
                            button.classList.remove('active');
                            button.style.backgroundColor = 'rgba(171, 190, 168, 1)'; // Hijau Muda
                        });
                        activeButton.classList.add('active');
                        activeButton.style.backgroundColor = 'rgba(49, 96, 44, 1)'; // Hijau Tua
                    }

                    // Set default active button
                    setActiveButton(document.getElementById('monthlyBtn'));
                </script>
            </div>
        </div>
    </div>
@endsection
