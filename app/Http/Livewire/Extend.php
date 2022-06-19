<?php

namespace App\Http\Livewire;
use App\Models\Extend as MExtend;
use Livewire\Component;
use Livewire\WithPagination;

class Extend extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $tambah, $edit, $hapus, $search;
    public $nama, $harga, $extend_id;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected function rules()
    {
        return [
            'nama' => 'required',
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
        
        MExtend::create([
            'nama' => $this->nama,
            'harga' => $this->harga,
        ]);

        session()->flash('sukses', 'Data berhasil disimpan.');
        $this->format();
    }

    public function show_edit(MExtend $extend)
    {
        $this->edit = true;
        $this->extend_id = $extend->id;
        $this->harga = $extend->harga;
        $this->nama = $extend->nama;
    }

    public function update()
    {
        $this->validate();

        $extend = MExtend::whereId($this->extend_id)->update([
            'nama' => $this->nama,
            'harga' => $this->harga,
        ]);

        session()->flash('sukses', 'Data berhasil diubah.');
        $this->format();
    }

    public function show_hapus(MExtend $extend)
    {
        $this->hapus = true;
        $this->extend_id = $extend->id;
        $this->nama = $extend->nama;
    }

    public function destroy()
    {
        MExtend::whereId($this->extend_id)->delete();

        session()->flash('sukses', 'Data berhasil dihapus.');
        $this->updatingSearch();
        $this->format();
    }

    public function format()
    {
        $this->tambah = false;
        $this->edit = false;
        $this->hapus = false;
        unset($this->nama, $this->harga, $this->extend_id);
    }

    public function format_search()
    {
        $this->search = '';
    }

    public function render()
    {
        if ($this->search) {
            $extend = MExtend::where('nama', 'like', '%'. $this->search .'%')->paginate(5);
        } else {
            $extend = MExtend::paginate(5);
        }
        return view('livewire.extend', compact('extend'));
    }
}
