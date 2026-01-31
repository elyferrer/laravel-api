<?php

namespace Database\Seeders;

use App\Models\Barangay;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class BarangaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = File::get("database/json_data/barangays.json");
        $encoded = json_decode($data);
        
        foreach ($encoded as $row) {
            Barangay::create([
                'region_code' => $row->regCode,
                'province_code' => $row->provCode,
                'municipality_code' => $row->citymunCode,
                'code' => $row->brgyCode,
                'name' => $row->brgyDesc,
            ]);
        }
    }
}
