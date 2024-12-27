<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = ['id_transaction', 'id_product', 'qty'];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class, 'id_product');
    }
}
