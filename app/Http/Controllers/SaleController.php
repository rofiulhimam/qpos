<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function index()
    {
        $today = DB::table('transactions')
            ->join('transaction_details', 'transaction_details.id_transaction', '=', 'transactions.id')
            ->whereDate('transactions.created_at', now()->format('Y-m-d')) // Membandingkan hanya tanggal
            ->sum('qty');
        $yesterday = DB::table('transactions')
            ->join('transaction_details', 'transaction_details.id_transaction', '=', 'transactions.id')
            ->whereDate('transactions.created_at', now()->subDay()->format('Y-m-d')) // Membandingkan hanya tanggal
            ->sum('qty');
        $percent_change_yesterday = $yesterday > 0 
            ? (($today - $yesterday) / $yesterday) * 100 
            : 0;

        $this_month = DB::table('transactions')
            ->join('transaction_details', 'transaction_details.id_transaction', '=', 'transactions.id')
            ->whereMonth('transactions.created_at', now()->month)
            ->whereYear('transactions.created_at', now()->year)
            ->sum('qty');
        $last_month = DB::table('transactions')
            ->join('transaction_details', 'transaction_details.id_transaction', '=', 'transactions.id')
            ->whereMonth('transactions.created_at', now()->subMonth()->month)
            ->whereYear('transactions.created_at', now()->subYear()->year)
            ->sum('qty');
        $percent_change_last_month = $last_month > 0 
            ? (($this_month - $last_month) / $last_month) * 100 
            : 0;

        $this_year = DB::table('transactions')
            ->join('transaction_details', 'transaction_details.id_transaction', '=', 'transactions.id')
            ->whereYear('transactions.created_at', now()->year)
            ->sum('qty');
        $last_year = DB::table('transactions')
            ->join('transaction_details', 'transaction_details.id_transaction', '=', 'transactions.id')
            ->whereYear('transactions.created_at', now()->subYear()->year)
            ->sum('qty');
        $percent_change_last_year = $last_year > 0 
            ? (($this_year - $last_year) / $last_year) * 100 
            : 0;

        $data_today = DB::table('transactions')
            ->join('transaction_details', 'transaction_details.id_transaction', '=', 'transactions.id')
            ->join('inventories', 'transaction_details.id_product', '=', 'inventories.id')
            ->select('inventories.name', 'inventories.price', 'inventories.image')
            ->selectRaw('SUM(transaction_details.qty) as total_penjualan_produk')
            ->whereDate('transactions.created_at', now()->format('Y-m-d')) // Membandingkan hanya tanggal
            ->groupBy('inventories.id', 'inventories.name', 'inventories.price', 'inventories.image') // Tambahkan groupBy untuk agregasi
            ->orderBy('total_penjualan_produk', 'desc') // Urutkan berdasarkan total penjualan
            ->get();
        $data_weekly = DB::table('transactions')
            ->join('transaction_details', 'transaction_details.id_transaction', '=', 'transactions.id')
            ->join('inventories', 'transaction_details.id_product', '=', 'inventories.id')
            ->select('inventories.name', 'inventories.price', 'inventories.image')
            ->selectRaw('SUM(transaction_details.qty) as total_penjualan_produk')
            ->whereBetween('transactions.created_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->groupBy('inventories.id', 'inventories.name', 'inventories.price', 'inventories.image') // Tambahkan groupBy untuk agregasi
            ->orderBy('total_penjualan_produk', 'desc') // Urutkan berdasarkan total penjualan
            ->get();
        $data_monthly = DB::table('transactions')
            ->join('transaction_details', 'transaction_details.id_transaction', '=', 'transactions.id')
            ->join('inventories', 'transaction_details.id_product', '=', 'inventories.id')
            ->select('inventories.name', 'inventories.price', 'inventories.image')
            ->selectRaw('SUM(transaction_details.qty) as total_penjualan_produk')
            ->whereMonth('transactions.created_at', now()->month) // Menggunakan bulan saat ini
            ->whereYear('transactions.created_at', now()->year)   // Menggunakan tahun saat ini
            ->groupBy('inventories.id', 'inventories.name', 'inventories.price', 'inventories.image') // Tambahkan groupBy untuk agregasi
            ->orderBy('total_penjualan_produk', 'desc') // Urutkan berdasarkan total penjualan
            ->get();
        $data_yearly = DB::table('transactions')
            ->join('transaction_details', 'transaction_details.id_transaction', '=', 'transactions.id')
            ->join('inventories', 'transaction_details.id_product', '=', 'inventories.id')
            ->select('inventories.name', 'inventories.price', 'inventories.image')
            ->selectRaw('SUM(transaction_details.qty) as total_penjualan_produk')
            ->whereYear('transactions.created_at', now()->year)   // Menggunakan tahun saat ini
            ->groupBy('inventories.id', 'inventories.name', 'inventories.price', 'inventories.image') // Tambahkan groupBy untuk agregasi
            ->orderBy('total_penjualan_produk', 'desc') // Urutkan berdasarkan total penjualan
            ->get();

        return view('pages.penjualan.index', [
            'today' => $today,
            'yesterday' => $yesterday,
            'percent_change_yesterday' => $percent_change_yesterday,
            'this_month' => $this_month,
            'last_month' => $last_month,
            'percent_change_last_month' => $percent_change_last_month,
            'this_year' => $this_year,
            'last_year' => $last_year,
            'percent_change_last_year' => $percent_change_last_year,
            'data_today' => $data_today,
            'data_weekly' => $data_weekly,
            'data_monthly' => $data_monthly,
            'data_yearly' => $data_yearly,
        ]);
    }

    public function getSalesData($period)
    {
        switch ($period) {
            case 'today':
                $data = DB::table('transactions')
                    ->join('transaction_details', 'transaction_details.id_transaction', '=', 'transactions.id')
                    ->join('inventories', 'transaction_details.id_product', '=', 'inventories.id')
                    ->select('inventories.name', 'inventories.price', 'inventories.image')
                    ->selectRaw('SUM(transaction_details.qty) as total_penjualan_produk')
                    ->whereDate('transactions.created_at', now()->format('Y-m-d'))
                    ->groupBy('inventories.id')
                    ->orderBy('total_penjualan_produk', 'desc')
                    ->get();
                break;

            case 'weekly':
                $data = DB::table('transactions')
                    ->join('transaction_details', 'transaction_details.id_transaction', '=', 'transactions.id')
                    ->join('inventories', 'transaction_details.id_product', '=', 'inventories.id')
                    ->select('inventories.name', 'inventories.price', 'inventories.image')
                    ->selectRaw('SUM(transaction_details.qty) as total_penjualan_produk')
                    ->whereBetween('transactions.created_at', [now()->startOfWeek(), now()->endOfWeek()])
                    ->groupBy('inventories.id')
                    ->orderBy('total_penjualan_produk', 'desc')
                    ->get();
                break;

            case 'monthly':
                $data = DB::table('transactions')
                    ->join('transaction_details', 'transaction_details.id_transaction', '=', 'transactions.id')
                    ->join('inventories', 'transaction_details.id_product', '=', 'inventories.id')
                    ->select('inventories.name', 'inventories.price', 'inventories.image')
                    ->selectRaw('SUM(transaction_details.qty) as total_penjualan_produk')
                    ->whereMonth('transactions.created_at', now()->month)
                    ->whereYear('transactions.created_at', now()->year)
                    ->groupBy('inventories.id')
                    ->orderBy('total_penjualan_produk', 'desc')
                    ->get();
                break;

            case 'yearly':
                $data = DB::table('transactions')
                    ->join('transaction_details', 'transaction_details.id_transaction', '=', 'transactions.id')
                    ->join('inventories', 'transaction_details.id_product', '=', 'inventories.id')
                    ->select('inventories.name', 'inventories.price', 'inventories.image')
                    ->selectRaw('SUM(transaction_details.qty) as total_penjualan_produk')
                    ->whereYear('transactions.created_at', now()->year)
                    ->groupBy('inventories.id')
                    ->orderBy('total_penjualan_produk', 'desc')
                    ->get();
                break;

            default:
                $data = [];
                break;
        }

        return response()->json($data);
    }
}
