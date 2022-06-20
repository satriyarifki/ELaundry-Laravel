@extends('layouts.laypdf')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Transaksi</h5>
                <table class="table table-sm table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th width="5%" scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Total Bayar</th>
                            <th scope="col">Express</th>
                            <th scope="col">Berat</th>
                            <th scope="col">Setrika</th>
                            <th scope="col">Tanggal Diterima</th>
                            <th scope="col">Tanggal Diambil</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->customer->nama }}</td>
                                <td>Rp. {{ number_format($item->total_bayar) }}</td>
                                <td>{{ $item->express->nama }}</td>
                                <td>{{ $item->berat }} Kg</td>
                                <td>{{ $item->setrika->nama }} </td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_diterima)->format('d m Y, H:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_diambil)->format('d m Y, H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

