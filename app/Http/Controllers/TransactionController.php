<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'qty_total' => 'required|integer',
            'price_total' => 'required|integer',
            'items' => 'required|array',
        ]);

        try {
            DB::beginTransaction();

            // Simpan transaksi utama
            $transaction = Transaction::create([
                'total_qty' => $validatedData['qty_total'],
                'total_price' => $validatedData['price_total'],
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
}
