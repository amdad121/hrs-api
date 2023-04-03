<?php

namespace Database\Seeders;

use App\Models\Amenity;
use Illuminate\Database\Seeder;

class AmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Amenity::create(['name' => 'WiFi']);
        Amenity::create(['name' => 'Breakfast']);
        Amenity::create(['name' => 'AC']);
        Amenity::create(['name' => 'TV']);
    }
}
