<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('layouts/sidebar')
        </div>
        <div class="col-md-9">
            <h2>Halaman Transaksi</h2>

            @include('layouts/flashdata')

            <div class="row">
                <div class="col-md-6">
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="customer_nama">Customer</label>
                                <select wire:model="customer_nama" class="form-control" id="customer_nama">
                                    <option>Pilih Customer</option>
                                    @foreach ($customer as $cust)
                                        <option value="{{ $cust->id }}">{{ $cust->nama }}</option>
                                    @endforeach
                                </select>
                                @error('customer_nama') <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="express_nama">Express</label>
                                <select wire:model="express_nama" class="form-control" id="express_nama">
                                    <option>Pilih Layanan</option>
                                    @foreach ($express as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}({{ $item->durasi }} Jam) / (Rp.
                                            {{ number_format($item->harga) }})</option>
                                    @endforeach
                                </select>
                                @error('express_nama') <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="setrika_nama">Setrika</label>
                                <select wire:model="setrika_nama" class="form-control" id="setrika_nama">
                                    <option>Pilih Layanan</option>
                                    @foreach ($setrika as $set)
                                        <option value="{{ $set->id }}">{{ $set->nama }} / (Rp.
                                            {{ number_format($set->harga_setrika) }})</option>
                                    @endforeach
                                </select>
                                @error('setrika_nama') <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="berat">Berat</label>
                                <input wire:model="berat" type="number" class="form-control" id="berat" min="1">
                                @error('berat') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group">
                                <label for="total_bayar">Total Bayar</label>
                                <input wire:model="total_bayar" readonly type="text" class="form-control"
                                    id="total_bayar">
                                @error('total_bayar') <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Extend</label>
                                @foreach ($extend as $key => $item)
                                    <div class="input-group mb-2">   
                                        <select wire:model="extend.{{$key}}" class="form-control" >
                                            <option>Pilih Extend</option>
                                            @foreach ($extends as $bar)
                                                <option value="{{ $bar->id }}">{{ $bar->nama }} + (Rp.
                                                    {{ number_format($bar->harga) }})</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-prepend">
                                            <div wire:click="hapus_barang({{$key}})" class="input-group-text pointer">x</div>
                                        </div>
                                    </div>
                                @endforeach
                                @error('extend') <small class="text-danger">{{ $message }}</small> @enderror
                                @error('extend.*') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <span wire:click="tambah_barang" class="btn btn-success btn-sm mt-2">Tambah</span>
                        </div>
                    </div>
                    <button wire:click="store" class="btn btn-success btn-md mt-3">Simpan Transaksi</button>
                </div>
            </div>
        </div>
    </div>
</div>

