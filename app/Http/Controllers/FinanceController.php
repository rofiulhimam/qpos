<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use Carbon\Carbon;

class FinanceController extends Controller
{
    public function index()
    {
        $today = DB::table('transactions')
            ->whereDate('created_at', now()->format('Y-m-d')) // Membandingkan hanya tanggal
            ->sum('total_price');
        $yesterday = DB::table('transactions')
            ->whereDate('created_at', now()->subDay()->format('Y-m-d'))
            ->sum('total_price');
        $percent_change_yesterday = $yesterday > 0 
            ? (($today - $yesterday) / $yesterday) * 100 
            : 0;

        $this_month = DB::table('transactions')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total_price');
        $last_month = DB::table('transactions')
            ->whereMonth('created_at', now()->subMonth()->month)
            ->whereYear('created_at', now()->subMonth()->year)
            ->sum('total_price');
        $percent_change_last_month = $last_month > 0 
            ? (($this_month - $last_month) / $last_month) * 100 
            : 0;

        $this_year = DB::table('transactions')
            ->whereYear('created_at', now()->year)
            ->sum('total_price');
        $last_year = DB::table('transactions')
            ->whereYear('created_at', now()->subYear()->year)
            ->sum('total_price');
        $percent_change_last_year = $last_year > 0 
            ? (($this_year - $last_year) / $last_year) * 100 
            : 0;

        // Data untuk grafik 12 bulan terakhir
        $monthly_data = DB::table('transactions')
            ->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, SUM(total_price) as total')
            ->where('created_at', '>=', now()->subMonths(12))
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->month => $item->total];
            });

        // Pastikan semua bulan dalam 12 bulan terakhir memiliki nilai
        $monthly_labels = collect(range(0, 11))->map(function ($i) {
            return now()->subMonths($i)->format('Y-m');
        })->reverse();

        $monthly_chart_data = $monthly_labels->mapWithKeys(function ($label) use ($monthly_data) {
            return [$label => $monthly_data[$label] ?? 0];
        });

        // Grafik mingguan (8 minggu terakhir)
        $weekly_data = DB::table('transactions')
            ->selectRaw('YEARWEEK(created_at, 1) as week, SUM(total_price) as total')
            ->where('created_at', '>=', now()->subWeeks(8))
            ->groupBy('week')
            ->orderBy('week', 'asc')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->week => $item->total];
            });

        $weekly_labels = collect(range(0, 7))->map(function ($i) {
            $startOfWeek = now()->subWeeks($i)->startOfWeek(Carbon::MONDAY);
            $endOfWeek = $startOfWeek->copy()->endOfWeek(Carbon::SUNDAY);

            // Format tanggal mingguan
            return $startOfWeek->format('d M') . ' - ' . $endOfWeek->format('d M Y');
        })->reverse();

        $weekly_chart_data = $weekly_labels->mapWithKeys(function ($label, $index) use ($weekly_data) {
            // Ambil data dengan menggunakan indeks sebagai kunci
            $weekKey = now()->subWeeks($index)->format('oW'); // Format ISO week
            return [$label => $weekly_data[$weekKey] ?? 0];
        });

        // Grafik tahunan (5 tahun terakhir)
        $yearly_data = DB::table('transactions')
            ->selectRaw('YEAR(created_at) as year, SUM(total_price) as total')
            ->where('created_at', '>=', now()->subYears(5))
            ->groupBy('year')
            ->orderBy('year', 'asc')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->year => $item->total];
            });

        $yearly_labels = collect(range(0, 4))->map(function ($i) {
            return now()->subYears($i)->year;
        })->reverse();

        $yearly_chart_data = $yearly_labels->mapWithKeys(function ($label) use ($yearly_data) {
            return [$label => $yearly_data[$label] ?? 0];
        });

        return view('pages.keuangan.index', [
            'today' => $today,
            'yesterday' => $yesterday,
            'percent_change_yesterday' => $percent_change_yesterday,
            'this_month' => $this_month,
            'last_month' => $last_month,
            'percent_change_last_month' => $percent_change_last_month,
            'this_year' => $this_year,
            'last_year' => $last_year,
            'percent_change_last_year' => $percent_change_last_year,
            'chart_labels' => $monthly_chart_data->keys(),
            'chart_values' => $monthly_chart_data->values(),
            'chart_labels_weekly' => $weekly_chart_data->keys(),
            'chart_values_weekly' => $weekly_chart_data->values(),
            'chart_labels_yearly' => $yearly_chart_data->keys(),
            'chart_values_yearly' => $yearly_chart_data->values(),
        ]);
    }
}
