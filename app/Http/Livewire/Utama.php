<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TransaksiLaundry;
use App\Models\Customer;
use Faker\Factory;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Utama extends Component
{
    use WithFileUploads;
    public $image, $transaksi_id, $edit;

    public function show_edit(TransaksiLaundry $transaksi)
    {
        $this->edit = true;
        $this->transaksi_id = $transaksi->id;
        $this->image = $transaksi->path_image;
    }

    public function save()
    {
        $this->validate([
            'image' => 'image|max:2048', // 1MB Max
        ]);

        $this->image->storePubliclyAs('public', (string)$this->transaksi_id . '.jpg');

        TransaksiLaundry::whereId($this->transaksi_id)->update([
            'path_image' => $this->image,
        ]);
        
        session()->flash('sukses', 'Data berhasil diubah.');
        $this->format();
    }

    public function format()
    {
        $this->tambah = false;
        $this->edit = false;
        $this->hapus = false;
        unset($this->image, $this->transaksi_id);
    }

    public function render()
    {
        $faker = Factory::create();
        $nowDate = Carbon::now();

        $count_diterima = TransaksiLaundry::where('status', 0)->count();
        $count_dicuci = TransaksiLaundry::where('status', 1)->count();
        $count_dikeringkan = TransaksiLaundry::where('status', 2)->count();
        $count_disetrika = TransaksiLaundry::where('status', 3)->count();
        $count_menunggu_pembayaran = TransaksiLaundry::where('status', 4)->count();
        $count_selesa = TransaksiLaundry::where('status', 5)->count();
        $count_selesai = TransaksiLaundry::whereDate('tanggal_diambil','<=', $nowDate)->count();
        $count_customer = Customer::all()->count();

        $selesa = TransaksiLaundry::latest()->limit(5)->where('status', 5)->get();
        $all = TransaksiLaundry::all();
        $selesai = TransaksiLaundry::whereDate('tanggal_diambil','<=', $nowDate)->get();
        return view('livewire.utama',compact('count_diterima', 'count_dicuci', 'count_dikeringkan', 'count_disetrika',
        'count_menunggu_pembayaran', 'count_selesai', 'count_customer', 'selesai', 'all'));
    }
}
