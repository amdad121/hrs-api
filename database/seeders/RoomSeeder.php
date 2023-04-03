<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create([
            'name' => 'Standard Room',
            'size' => '23sqm (237sq-ft)',
            'description' => 'Offering city views, our comfortable Standard Room features convenient amenities to offer you a pleasant stay.',
            'photo' => 'photos/Fi8Grblz16rnW8b9PP7FYP2vLuOLweheWKzJex8b.png',
            'maximum_occupancy' => 4,
            'price' => 110,
        ]);

        Room::create([
            'name' => 'Deluxe Room',
            'size' => '28sqm (302sq-ft)',
            'description' => 'Our Deluxe Room is a relaxing space for you to unwind with its city and pool views as well as a selection of cable television channels.',
            'photo' => 'photos/Fi8Grblz16rnW8b9PP7FYP2pLuOLweheWKzJex8b.png',
            'maximum_occupancy' => 3,
            'price' => 130,
        ]);
    }
}
