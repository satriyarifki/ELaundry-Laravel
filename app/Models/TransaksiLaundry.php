<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiLaundry extends Model
{
    use HasFactory;
    protected $table='transaksi_laundry';
    protected $fillable = ['customer_id', 'express_id', 'setrika_id', 'berat', 'total_bayar', 'status', 'tanggal_diterima', 'tanggal_diambil', 'path_image'];

    public function extend(){
        return $this->belongsToMany(Extend::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function express()
    {
        return $this->belongsTo(Express::class);
    }
    public function setrika()
    {
        return $this->belongsTo(Setrika::class);
    }
}


