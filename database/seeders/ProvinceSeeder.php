<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = File::get("database/json_data/provinces.json");
        $encoded = json_decode($data);
        
        foreach ($encoded as $row) {
            Province::create([
                'region_code' => $row->regCode,
                'code' => $row->provCode,
                'name' => $row->provDesc,
                'psgc_code' => $row->psgcCode
            ]);
        }
        
    }
}
