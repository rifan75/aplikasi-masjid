<?php

use Illuminate\Database\Seeder;
use Modules\Admin\Entities\Mosque;
use Faker\Generator as Faker;

class MosqueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

          $mosque = [ 
              'name' => 'Masjid Al-Husna',
              'contact' => [
                'Address' => 'Griya Suradita Indah (Perum Korpri) Ds. Suradita Kec. Cisauk',
                'City' => 'Tangerang',
                'Country' => 'Banten Indonesia',
                'Email' => 'masjidku.alhusna@gmail.com',
                'Telephone' => '0821223456,021-254689,589454114',
                ],
              'organizer' => [
                'chief' => $faker->name,
                'deputy_chief' => $faker->name,
                'imam' => $faker->name,
                'marbout' => $faker->name,
                'treasury' => $faker->name,
                'security' => $faker->name,
                'consumsi' => $faker->name,
                ],
              'history' => 'Masjid Tempat Ibadah Ummat Islam',
          ];

          Mosque::create($mosque);
    }
}
