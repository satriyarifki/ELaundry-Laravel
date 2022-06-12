<?php

namespace App\Http\Livewire;
use App\Models\Express as MExpress;
use Livewire\WithPagination;
use Livewire\Component;

class Express extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $tambah, $edit, $hapus, $search;
    public $nama, $durasi, $harga, $express_id;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected function rules()
    {
        return [
            'nama' => 'required',
            'durasi' => 'required|min:1|numeric',
            'harga' => 'required|min:1000|numeric',
        ];
    }

    public function show_tambah()
    {
        $this->tambah = true;
    }

    public function store()
    {
        $this->validate();
        
        MExpress::create([
            'nama' => $this->nama,
            'durasi' => $this->durasi,
            'harga' => $this->harga,
        ]);

        session()->flash('sukses', 'Data berhasil disimpan.');
        $this->format();
    }

    public function show_edit(MExpress $express)
    {
        $this->edit = true;
        $this->express_id = $express->id;
        $this->harga = $express->harga;
        $this->nama = $express->nama;
        $this->durasi = $express->durasi;
    }

    public function update()
    {
        $this->validate();

        $express = MExpress::whereId($this->express_id)->update([
            'nama' => $this->nama,
            'durasi' => $this->durasi,
            'harga' => $this->harga,
        ]);

        session()->flash('sukses', 'Data berhasil diubah.');
        $this->format();
    }

    public function show_hapus(MExpress $express)
    {
        $this->hapus = true;
        $this->express_id = $express->id;
        $this->nama = $express->nama;
    }

    public function destroy()
    {
        MExpress::whereId($this->express_id)->delete();

        session()->flash('sukses', 'Data berhasil dihapus.');
        $this->updatingSearch();
        $this->format();
    }

    public function format()
    {
        $this->tambah = false;
        $this->edit = false;
        $this->hapus = false;
        unset($this->nama, $this->durasi, $this->harga, $this->express_id);
    }

    public function format_search()
    {
        $this->search = '';
    }

    public function render()
    {
        if ($this->search) {
            $express = MExpress::where('nama', 'like', '%'. $this->search .'%')->paginate(5);
        } else {
            $express = MExpress::paginate(5);
        }
        return view('livewire.express', compact('express'));
    }
}
