<?php

namespace Database\Seeders;

use App\Models\Municipality;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class MunicipalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = File::get("database/json_data/municipalities.json");
        $encoded = json_decode($data);
        
        foreach ($encoded as $row) {
            Municipality::create([
                'region_code' => $row->regDesc,
                'province_code' => $row->provCode,
                'code' => $row->citymunCode,
                'name' => $row->citymunDesc,
                'psgc_code' => $row->psgcCode
            ]);
        }
    }
}
