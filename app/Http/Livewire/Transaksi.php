<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Extend;
use App\Models\Setrika;
use App\Models\Express;
use App\Models\ExtendTransaksi;
use App\Models\TransaksiLaundry;
use Illuminate\Support\Facades\Mail;

class Transaksi extends Component
{
    public $customer_nama, $express_nama, $setrika_nama, $berat, $tambah, $total_bayar, $extend = [];

    public function mount()
    {
        array_push($this->extend, Extend::find(1)->id);
    }

    protected function rules()
    {
        return [
            'customer_nama' => 'required',
            'express_nama' => 'required',
            'setrika_nama' => 'required',
            'berat' => 'required|min:1|numeric',
            'extend' => 'array',
            'extend.*' => 'required'
        ];
    }

    public function tambah_barang()
    {
        array_push($this->extend, Extend::find(1)->id);
    }

    public function hapus_barang($key)
    {
        unset($this->extend[$key]);
    }

    public function store()
    {
        $this->validate();

        DB::transaction(function () {
            $express = Express::find($this->express_nama);

            $customer = Customer::find($this->customer_nama);

            $extends = Extend::find($this->extend);

            $setrika = Setrika::find($this->setrika_nama);

            $trans = TransaksiLaundry::find(DB::table('transaksi_laundry')->max('id'));
    
            $tambah = 0;
            
            foreach ($this->extend as $item) {
                ExtendTransaksi::create([
                    'transaksi_laundry_id' => $trans->id+1,
                    'extend_id' => $item,
                ]);
                $tambah += Extend::find($item)->harga;
            }
            $transaksi = TransaksiLaundry::create([
                'customer_id' => $this->customer_nama,
                'express_id' => $this->express_nama,
                'setrika_id' => $this->setrika_nama,
                'berat' => $this->berat,
                'total_bayar' => ($express->harga * $this->berat) + ($setrika->harga_setrika * $this->berat) + $tambah,
                'status' => 0,
                'tanggal_diterima' => now(),
                'tanggal_diambil' => now()->addHours($express->durasi),
                'path_image' => '',
            ]);


            session()->flash('sukses', 'Data berhasil ditambahkan.');
            return redirect('/transaksi');
        });
    }

    public function render()
    {
        if ($this->express_nama && $this->berat && $this->setrika_nama) {
            $express = express::find($this->express_nama);
            $extends = Extend::find($this->extend);
            $setrika = Setrika::find($this->setrika_nama);
            $tambah = 0;
            foreach ($this->extend as $item) {
                $ex = Extend::find($item);
                $tambah += Extend::find($item)->harga;
            }
            $this->total_bayar = ($express->harga * $this->berat) + ($setrika->harga_setrika * $this->berat) + $tambah;
        } else {
            $this->total_bayar = 0;
        }

        $trans = TransaksiLaundry::find(DB::table('transaksi_laundry')->max('id'));
        $express = express::all();
        $extends = Extend::all();
        $setrika = Setrika::all();
        $customer = Customer::all();
        return view('livewire.transaksi', compact('express', 'setrika', 'customer', 'extends'));
    }
}

