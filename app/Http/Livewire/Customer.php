<?php

namespace App\Http\Livewire;
use App\Models\User;
use App\Models\Customer as MCustomer;
use Illuminate\Validation\Rules\Password;
use Livewire\WithPagination;
use Livewire\Component;

class Customer extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $tambah, $edit, $hapus, $search;
    public $nama, $alamat, $hp, $customer_id;

    protected function rules()
    {
        $customer = MCustomer::find($this->customer_id);

        $rule = [
            'nama' => 'required',
            'hp' => ['required', 'numeric', 'digits:12'],
            'alamat' => ['required'],
        ];

        return $rule;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function show_tambah()
    {
        $this->tambah = true;
    }

    public function store()
    {
        $this->validate();

        MCustomer::create([
            'nama' => $this->nama,
            'hp' => $this->hp,
            'alamat' => $this->alamat
        ]);

        session()->flash('sukses', 'Data berhasil ditambahkan.');
        $this->format();
    }

    public function show_edit(MCustomer $customer)
    {
        $this->edit = true;

        $this->customer_id = $customer->id;
        $this->nama = $customer->nama;
        $this->alamat = $customer->alamat;
        $this->hp = $customer->hp;
    }

    public function update()
    {
        $this->validate();

        $customer = MCustomer::find($this->customer_id);

        $customer->update([
            'nama' => $this->nama, 
            'hp' => $this->hp,
            'alamat' => $this->alamat
        ]);

        session()->flash('sukses', 'Data berhasil diubah.');
        $this->format();
    }

    public function show_hapus(MCustomer $customer)
    {
        $this->hapus = true;

        $this->customer_id = $customer->id;
        $this->nama = $customer->nama;
    }

    public function destroy()
    {
        $customer = MCustomer::find($this->customer_id);

        $customer->delete();

        session()->flash('sukses', 'Data berhasil dihapus.');
        $this->updatingSearch();
        $this->format();
    }

    public function format()
    {
        unset($this->nama, $this->hp, $this->alamat, $this->customer_id);
        $this->tambah = false;
        $this->edit = false;
        $this->hapus = false;
    }

    public function format_search()
    {
        $this->search = '';
    }

    public function render()
    {
        if ($this->search) {
            $customer = MCustomer::where('name', 'like', '%'. $this->search .'%')->paginate(5);
        } else {
            $customer = MCustomer::paginate(5);
        }
        return view('livewire.customer', compact('customer'));
    }
}
