<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function pos()
    {
        $inventories = DB::table('inventories')->where('stock', '=', 'Tersedia')->get();
        return view('pages.pos.index', compact('inventories'));
    }

    public function transaksi()
    {
        $transactions = Transaction::with([
            'transaction_details.inventory' => function ($query) {
                $query->select('id', 'name', 'price');
            }
        ])
        ->orderBy('created_at', 'desc') // Urutkan berdasarkan tanggal terbaru
        ->get()
        ->groupBy(function ($transaction) {
            return $transaction->created_at->format('Y-m-d'); // Kelompokkan berdasarkan tanggal
        });

        return view('pages.transaksi.index', ['transactions' => $transactions]);
    }

    public function filterTransactions(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $startDate = Carbon::parse($request->start_date)->startOfDay();
        $endDate = Carbon::parse($request->end_date)->endOfDay();

        $transactions = Transaction::with([
            'transaction_details.inventory' => function ($query) {
                $query->select('id', 'name', 'price');
            }
        ])
        ->whereBetween('created_at', [$startDate, $endDate])
        ->orderBy('created_at', 'desc')
        ->get()
        ->groupBy(function ($transaction) {
            return $transaction->created_at->format('Y-m-d');
        });

        return response()->json($transactions);
    }

    public function getTransactionDetails($id)
    {
        $transaction = Transaction::with('transaction_details.inventory')->find($id);

        if (!$transaction) {
            return response()->json(['error' => 'Transaction not found'], 404);
        }

        $details = $transaction->transaction_details->map(function ($transaction_detail) {
            return [
                'name' => $transaction_detail->inventory->name,
                'price' => $transaction_detail->inventory->price,
                'quantity' => $transaction_detail->qty,
            ];
        });

        return response()->json([
            'invoice_number' => $transaction->id,
            'cashier' => $transaction->cashier_name,
            'date' => $transaction->created_at->format('d/m/Y - H:i'),
            // 'payment_method' => $transaction->payment_method,
            'items' => $details,
            'total_items' => $transaction->total_qty,
            'total_price' => $transaction->total_price,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'qty_total' => 'required|integer',
            'price_total' => 'required|integer',
            'payment_method' => 'required|string',
            'payment_amount' => 'required|integer',
            'changes' => 'required|integer',
            'items' => 'required|array',
        ]);

        try {
            DB::beginTransaction();

            // Simpan transaksi utama
            $transaction = Transaction::create([
                'total_qty' => $validatedData['qty_total'],
                'total_price' => $validatedData['price_total'],
                'payment_method' => $validatedData['payment_method'],
                'payment_amount' => $validatedData['payment_amount'],
                'changes' => $validatedData['changes'],
                'cashier_name' => Auth::user()->name,
            ]);

            // Simpan detail transaksi
            foreach ($validatedData['items'] as $item) {
                TransactionDetail::create([
                    'id_transaction' => $transaction->id,
                    'id_product' => $item['id_product'],
                    'qty' => $item['qty'],
                ]);
            }

            DB::commit();

            return response()->json(['message' => 'Transaksi berhasil!'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }
    public function struk()
    {
        return view('pages.pos.struk'); // Ganti dengan path yang sesuai untuk tampilan struk
    }
}
