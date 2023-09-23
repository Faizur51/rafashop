<?php

namespace Database\Seeders;

use App\Models\Thana;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ThanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unit=json_decode(File::get(storage_path('data/thanas.json')),true);

        foreach($unit as $key=>$value){
            Thana::create($value);

        }
    }
}
