<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = File::get("database/json_data/regions.json");
        $data = json_decode($regions);
        
        foreach ($data as $row) {
            Region::create([
                'code' => $row->regCode,
                'name' => $row->regDesc,
                'psgc_code' => $row->psgcCode
            ]);
        }
    }
}
