<?php

use Illuminate\Database\Seeder;
use Modules\Admin\Entities\Dev;
use Modules\Admin\Entities\Event;

class DevEventTableSeeder extends Seeder
{
   /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            factory(Dev::class)->create();
            factory(Event::class,5)->create();
    }
}
