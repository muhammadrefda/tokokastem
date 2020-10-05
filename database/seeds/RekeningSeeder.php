<?php

use App\Rekening;
use Illuminate\Database\Seeder;

class RekeningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['bank_name' => 'BRI','atas_nama'=>'FIKRI SUHERI','no_rekening'=>'123123']
        ];
        Rekening::insert($data);
    }
}
