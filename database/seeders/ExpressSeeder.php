<?php

namespace Database\Seeders;

use App\Models\Express;
use Illuminate\Database\Seeder;

class ExpressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Express::create([
            'nama' => 'Terbaik',
            'durasi' => 16,
            'harga' => 12000,
            
        ]);
        Express::create([
            'nama' => 'Baik',
            'durasi' => 48,
            'harga' => 9000,
            
        ]);
        Express::create([
            'nama' => 'Normal',
            'durasi' => 72,
            'harga' => 7000,
            
        ]);
        Express::create([
            'nama' => 'Rendah',
            'durasi' => 120,
            'harga' => 5000,
            
        ]);
    }
}
