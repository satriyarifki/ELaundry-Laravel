<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\TransaksiLaundry;

class UploadImage extends Component
{
    use WithFileUploads;
 
    public $image;

    public function save()
    {
        $this->validate([
            'path_image' => 'image|max:1024', // 1MB Max
        ]);
 
        $this->image->store('transaksi_laundry');
    }
    public function render()
    {
        return view('livewire.upload-image');
    }
}
