<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(ScholarLectureTableSeeder::class);
         $this->call(ArticleTableSeeder::class);
         $this->call(DonationsTableSeeder::class);
         $this->call(MosqueTableSeeder::class);
         $this->call(CostTableSeeder::class);
         $this->call(DevEventTableSeeder::class);
    }
}
