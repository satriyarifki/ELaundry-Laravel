<?php

namespace Database\Seeders;

use App\Models\Extend;
use Illuminate\Database\Seeder;

class ExtendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Extend::create([
            'nama' => 'Sprei',
            'harga' => 5000,
            
        ]);
        Extend::create([
            'nama' => 'Handuk',
            'harga' => 2000,
            
        ]);
        Extend::create([
            'nama' => 'Selimut',
            'harga' => 6000,
            
        ]);
    }
}
