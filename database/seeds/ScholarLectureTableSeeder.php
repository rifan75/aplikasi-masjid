<?php

use Illuminate\Database\Seeder;
use Modules\Admin\Entities\Scholar;
use Modules\Admin\Entities\Lecture;
use Modules\Admin\Entities\Resume;

class ScholarLectureTableSeeder extends Seeder
{
   /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        factory(Scholar::class,5)->create()->each(function ($scholar) {
            $categories = [
                ['name'=>'Fiqih','note'=>'Pengajian Tentang Fiqih'],
                ['name'=>'Tauhid','note'=>'Pengajian Tentang Tauhid'],
                ['name'=>'Tafsir','note'=>'Pengajian Tentang Tafsir'],
                ['name'=>'Tahsin','note'=>'Pengajian Tentang Tahsin'],
                ['name'=>'Tausiyah','note'=>'Pengajian Tausiah'],
                ['name'=>'Tahlil','note'=>'Pengajian Tentang Tahlil'],
                ['name'=>'Umum','note'=>'Pengajian Umum'],
            ];
            foreach($categories as $category){
                factory(Lecture::class,3)->create([
                    'scholar'=>$scholar->name,
                    'category' =>$category['name'],
                ]);
            }
        });
        factory(Resume::class,50)->create();
    }
}
