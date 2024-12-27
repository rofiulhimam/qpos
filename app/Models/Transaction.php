<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['total_qty', 'total_price', 'cashier_name'];

    public function transaction_details()
    {
        return $this->hasMany(TransactionDetail::class, 'id_transaction');
    }
}
