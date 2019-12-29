<?php

use Illuminate\Database\Seeder;
use Modules\Admin\Entities\Cost;
use Modules\Admin\Entities\DetailCost;
use Modules\Admin\Entities\Mustahiq;
use Modules\Admin\Entities\Yatim;
use Faker\Generator as Faker;

class CostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $costs = [
            [
                'name'=>'Biaya  Pemeliharaan',
                'type' => 'Masjid',
                'note'=>'biaya kebersihan, biaya perbaikan alat, biaya tukang'
            ],
            [
                'name'=>'Biaya  Transportasi',
                'type' => 'Masjid',
                'note'=>'biaya bensin, ongkos pembelian, ongkos antar-jemput'
            ],
            [
                'name'=>'Biaya  Penyelenggaraan Ibadah',
                'type' => 'Masjid',
                'note'=>'gaji imam, gaji marbot, ongkos khotib jumat'
            ],
            [
                'name'=>'Biaya  Penyelenggaraan Kegiatan/Taklim/PHBI',
                'type' => 'Masjid',
                'note'=>'biaya yang berkaitan penyelenggaraan kegiatan selain Ramadhan'
            ],
            [
                'name'=>'Biaya Tukang',
                'type' => 'Pembangunan',
                'note'=>'biaya yang berkaitan Toilet/TPA & Turab Masjid'
            ],
            [
                'name'=>'Biaya Material',
                'type' => 'Pembangunan',
                'note'=>'biaya yang berkaitan Toilet/TPA & Turab Masjid'
            ],
            [
                'name'=>'Biaya Lain-lain',
                'type' => 'Pembangunan',
                'note'=>'biaya yang berkaitan Pelaksanaan Zakat'
            ],
           
          ];

          foreach ($costs as $cost)
          {
                $expend = Cost::create($cost);
                if ($expend->id==1)
                {
                    factory(DetailCost::class,100)->create([
                        'cost_id'=>$expend->id, 
                        ]);
                }
                if ($expend->id==2)
                {
                    factory(DetailCost::class,100)->create([
                        'cost_id'=>$expend->id, 
                        ]);
                }
                if ($expend->id==3)
                {
                    factory(DetailCost::class,50)->create([
                        'cost_id'=>$expend->id, 
                        ]);
                }
                if ($expend->id==4)
                {
                    factory(DetailCost::class,50)->create([
                        'cost_id'=>$expend->id, 
                        ]);
                }
                if ($expend->id==5)
                {
                    factory(DetailCost::class,50)->create([
                        'cost_id'=>$expend->id, 
                        ]);
                }
                if ($expend->id==6)
                {
                    factory(DetailCost::class,30)->create([
                        'cost_id'=>$expend->id, 
                        ]);
                }
                if ($expend->id==7)
                {
                    factory(DetailCost::class,70)->create([
                        'cost_id'=>$expend->id, 
                        ]);
                }
          }
          $jenis = ['Fakir', 'Miskin', 'Muallaf', 'Terbelit Hutang', 'Musafir', 'Jihad Fisabilillah', 'Pembebasan Budak'];
          //$randIndex = array_rand($jenis);
          foreach ($jenis as $jen)
          factory(Mustahiq::class,20)->create([
            'type' => $jen,
              //'type' => $jenis[$randIndex],
          ]);
          factory(Yatim::class,200)->create();
    }
}
