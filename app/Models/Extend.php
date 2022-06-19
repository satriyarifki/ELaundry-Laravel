<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extend extends Model
{
    use HasFactory;
    protected $table='extend';
    protected $fillable = ['nama', 'harga'];

    public function transaksi_laundry(){
        return $this->belongsToMany(TransaksiLaundry::class);
    }
}
