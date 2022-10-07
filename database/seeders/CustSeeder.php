<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'nama' => 'Satriya Rifki',
            'hp' => '087675564455',
            'alamat' => 'Jalan Soekarno Hatta No.2',
            
        ]);
    }
}
