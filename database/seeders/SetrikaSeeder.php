<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setrika;

class SetrikaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setrika::create([
            'nama' => 'Tidak Pakai',
            'harga_setrika' => 0,
        ]);
    }
}
