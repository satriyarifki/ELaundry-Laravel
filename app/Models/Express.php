<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Express extends Model
{
    use HasFactory;
    protected $table='express';
    protected $fillable = ['nama', 'durasi', 'harga'];

    public function transaksi()
    {
        return $this->hasMany(TransaksiLaundry::class);
    }
}
