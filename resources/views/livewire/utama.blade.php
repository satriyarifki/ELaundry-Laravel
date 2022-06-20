<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('layouts/sidebar')
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-8">
                    <h2>Halaman Utama</h2>
                </div>
                <div class="col-md-4 d-flex justify-content-end">
                    <a class="btn btn-success" href="/print" role="button">Cetak Data Transaksi</a>
                </div>
                
            </div>
            @include('livewire/upload-image')
            @include('layouts/flashdata')
            <br>
            <div class="row">
                <div class="col-lg-4 col-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h5>Total Diterima :</h5>
                                </div>
                                <div class="col-md-4">
                                    <h1>{{$count_diterima}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-4 col-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h5>Total Dicuci :</h5>
                                </div>
                                <div class="col-md-4">
                                    <h1>-</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h5>Total Dikeringkan :</h5>
                                </div>
                                <div class="col-md-4">
                                    <h1>-</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h5>Total Disetrika :</h5>
                                </div>
                                <div class="col-md-4">
                                    <h1>-</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="col-lg-4 col-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h5>Total Selesai :</h5>
                                </div>
                                <div class="col-md-4">
                                <h1>{{$count_selesai}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-7">
                                    <h5>Total Customer :</h5>
                                </div>
                                <div class="col-md-4">
                                <h1>{{$count_customer}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                   <div class="card">
                       <div class="card-body">
                        <h5 class="card-title">Transaksi Selesai</h5>
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th width="5%" scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Total Bayar</th>
                                    <th scope="col">Layanan</th>
                                    <th scope="col">Tanggal Diterima</th>
                                    <th scope="col">Tanggal Diambil</th>
                                    <th scope="col">Gambar</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($selesai as $item)
                                <tr class="">
                                    <th scope="row" class="align-middle">{{ $loop->iteration }}.</th>
                                    <td class="align-middle">{{ $item->customer->nama }}</td>
                                    <td class="align-middle">Rp. {{ number_format($item->total_bayar) }}</td>
                                    <td class="align-middle">{{ $item->express->nama }}</td>
                                    <td class="align-middle">{{ \Carbon\Carbon::parse($item->tanggal_diterima)->format('d m Y, H:i') }}</td>
                                    <td class="align-middle">{{ \Carbon\Carbon::parse($item->tanggal_diambil)->format('d m Y, H:i') }}</td>
                                    <td class="align-middle"><img width="100px" src="{{asset('storage/'.$item->id.'.jpg')}}" id="zoomA">
                                        <button wire:click="show_edit({{ $item->id }})" type="button"
                                            class="btn btn-sm btn-primary mr-2">Tambah</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>