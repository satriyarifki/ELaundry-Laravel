<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setrika extends Model
{
    use HasFactory;
    protected $table='setrika';
    protected $fillable = ['nama', 'harga'];

    public function transaksi(){
        return $this->belongsToMany(TransaksiLaundry::class);
    }
}
