<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtendTransaksi extends Model
{
    use HasFactory;
    protected $table='extend_transaksi_laundry';
    protected $fillable = ['transaksi_laundry_id', 'extend_id'];
}
