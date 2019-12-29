<?php

use Illuminate\Database\Seeder;
use Modules\Admin\Entities\Donation;
use Modules\Admin\Entities\DetailDonation;
use Faker\Generator as Faker;
use Carbon\Carbon;

class DonationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {   
        $donations = [
            [
                'name'=>'Shodaqoh, Infaq (Transfer)',
                'type' => 'Masjid',
                'form' => 'direct_bank',
                'contact' => [
                    'received' => '0213354666/ Bank Syariah Mandiri',
                    'confirmation' => '08222546644 - Whatapp/SMS: Abdul Wahab || 08222546644 - Whatapp/SMS: Tini Tono',
                ],
                'note'=>'Harap selalu melakukan konfirmasi dan memberitahukan jenis donasinya saat 
                         konfirmasi atau melalui berita transfer'
            ],
            [
                'name'=>'Kotak Amal (Shodaqoh/ Infaq) di Mesjid',
                'type' => 'Masjid',
                'form' => 'lock_box',
                'contact' => [
                    'incharge' => 'Ahmad Syukur',
                    'counter' => 'Baim Wong',
                    'witness1' => 'Umar Bin Ali',
                    'witness2' => 'Ali Bin Umar',
                ],
                'note'=>'Harap selalu melakukan konfirmasi dan memberitahukan jenis donasinya saat 
                         konfirmasi atau melalui berita transfer'
            ],
            [
                'name'=>'Kotak Amal (Shodaqoh/ Infaq) setiap Jumat',
                'type' => 'Masjid',
                'form' => 'lock_box',
                'contact' => [
                    'incharge' => 'Alimin Jaya',
                    'counter' => 'Prabowo',
                    'witness1' => 'Soeharto',
                    'witness2' => 'BJ Habiebie',
                ],
                'note'=>'Harap selalu melakukan konfirmasi dan memberitahukan jenis donasinya saat 
                         konfirmasi atau melalui berita transfer'
            ],
            [
                'name'=>'Kotak Amal (Shodaqoh/ Infaq) saat Kegiatan/ Kajian',
                'type' => 'Masjid',
                'form' => 'lock_box',
                'contact' => [
                    'incharge' => 'Munkar Nakir',
                    'counter' => 'Isrofil',
                    'witness1' => 'Jibril',
                    'witness2' => 'Abdul Malik',
                ],
                'note'=>'Harap selalu melakukan konfirmasi dan memberitahukan jenis donasinya saat 
                         konfirmasi atau melalui berita transfer'
            ],
            [
                'name'=>'Pembangunan Toilet/TPA & Turab Masjid (Transfer)',
                'type' => 'Pembangunan',
                'form' => 'direct_bank',
                'contact' => [
                    'received' => '0213354666/ Bank Syariah Mandiri',
                    'confirmation' => '08222546644 - Whatapp/SMS: Abdul Wahab || 08222546644 - Whatapp/SMS: Tini Tono',
                ],
                'note'=>'Harap selalu melakukan konfirmasi dan memberitahukan jenis donasinya saat 
                         konfirmasi atau melalui berita transfer'
            ],
            [
                'name'=>'Pembangunan Toilet/TPA & Turab Masjid (Cash)',
                'type' => 'Pembangunan',
                'form' => 'direct_bank',
                'contact' => [
                    'received' => '0213354666/ Bank Syariah Mandiri',
                    'confirmation' => '08222546644 - Whatapp/SMS: Abdul Wahab || 08222546644 - Whatapp/SMS: Tini Tono',
                ],
                'note'=>'Harap selalu melakukan konfirmasi dan memberitahukan jenis donasinya saat 
                         konfirmasi'
            ],
            [
                'name'=>'Pembangunan Toilet/TPA & Turab Masjid (Material)',
                'type' => 'Pembangunan',
                'form' => 'material',
                'contact' => [
                    'received' => '0213354666/ Bank Syariah Mandiri',
                    'confirmation' => '08222546644 - Whatapp/SMS: Abdul Wahab || 08222546644 - Whatapp/SMS: Tini Tono',
                ],
                'note'=>'Harap selalu melakukan konfirmasi dan memberitahukan jenis donasinya saat 
                         konfirmasi'
            ],
            [
                'name'=>'Donasi/Hibah/Waqah Barang(Material)',
                'type' => 'Pembangunan',
                'form' => 'material',
                'contact' => [
                    'received' => '0213354666/ Bank Syariah Mandiri',
                    'confirmation' => '08222546644 - Whatapp/SMS: Abdul Wahab || 08222546644 - Whatapp/SMS: Tini Tono',
                ],
                'note'=>'Harap selalu melakukan konfirmasi dan memberitahukan jenis donasinya saat 
                         konfirmasi'
            ],
          ];
          
          $fridays = [];
          $fromDate = '2016-10-14';
          $toDate = '2019-12-14';
          $startDate = Carbon::parse($fromDate)->next(Carbon::FRIDAY); // Get the first friday.
          $endDate = Carbon::parse($toDate);
          
          for ($date = $startDate; $date->lte($endDate); $date->addWeek()) {
              $fridays[] = $date->format('d M Y');
          } 

          foreach ($donations as $donation)
          {
                $donat = Donation::create($donation);
                if ($donat->id==1)
                {
                    factory(DetailDonation::class,100)->create([
                        'donations_id'=>$donat->id, 
                        'note'=>'Infaq,Shadaqoh- transfer',
                        ]);
                }
                if ($donat->id==2)
                {
                    factory(DetailDonation::class,100)->create([
                        'donations_id'=>$donat->id, 
                        'note'=>'Infaq,Shadaqoh- cash',
                        ]);
                }
                if ($donat->id==3)
                {
                    foreach ($fridays as $friday)
                    {
                        factory(DetailDonation::class)->create([
                            'donations_id'=>$donat->id, 
                            'date' =>$friday,
                            'note'=>'No. BA- /Al-Husna/Ktk-Amal Tgl ..........',
                            ]);
                    }
                }
                if ($donat->id==4)
                {
                    factory(DetailDonation::class,50)->create([
                        'donations_id'=>$donat->id, 
                        'note'=>'No. BA- /Al-Husna/Ktk-Jumat Tgl ..........',
                        ]);
                }
                if ($donat->id==5)
                {
                    factory(DetailDonation::class,50)->create([
                        'donations_id'=>$donat->id, 
                        'note'=>'No. BA- /Al-Husna/Ktk-Keg Tgl .......... Nama Keg.........',
                        ]);
                }
                if ($donat->id==6)
                {
                    factory(DetailDonation::class,70)->create([
                        'donations_id'=>$donat->id, 
                        'note'=>'Pembangunan Toilet/TPA & Turab Masjid (Transfer)',
                        ]);
                }
                if ($donat->id==7)
                {
                    factory(DetailDonation::class,70)->create([
                        'donations_id'=>$donat->id, 
                        'note'=>'Pembangunan Toilet/TPA & Turab Masjid (Transfer)',
                        ]);
                }
                if ($donat->id==8)
                {
                    factory(DetailDonation::class,70)->create([
                        'donations_id'=>$donat->id, 
                        'note'=>'Jenis Yg di Sumbangkan :  50 Sak Semen',
                        ]);
                }
          }

    }
}
