<div class="list-group d-none d-sm-none d-md-block">
    <a href="/utama" class="list-group-item list-group-item-action">Halaman Utama</a>
    @can('admin')
    <a href="/karyawan" class="list-group-item list-group-item-action">Karyawan</a>
    @endcan
    <a href="/customer" class="list-group-item list-group-item-action">Customer</a>
    <a href="/express" class="list-group-item list-group-item-action">Express</a>
    <a href="/extend" class="list-group-item list-group-item-action">Extend</a>
    <a href="/transaksi" class="list-group-item list-group-item-action">Transaksi</a>
    <!-- <a href="/progres" class="list-group-item list-group-item-action">Progres</a> -->
</div>