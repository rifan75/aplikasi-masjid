<?php

use Illuminate\Database\Seeder;
use Modules\Admin\Entities\User;
use Modules\Admin\Entities\Profile;
use Modules\Admin\Entities\Category;
use Modules\Admin\Entities\FinanceType;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        /**
         * Admin database seeds.
         */
        $roles=[
			'admin',
            'member',
            'writer',
            'host',
        ];
        
		$permissions=[
			'master-data'=>['admin'],
            'manage-user'=>['admin','host'],
            'manage-scholar'=>['admin','host'],
			'manage-content'=>['admin','host','writer'],
			'manage-event'=>['admin','host','writer'],
            'manage-lecturer'=>['admin','host','writer'],
            'manage-donation'=>['admin','host'],
            'read-donation-detail'=>['admin','host','writer'],
            'read-contact-detail' =>['admin','host','writer'],
		];
        
        
		foreach ($roles as $role) {
            $rolesArray[$role] = Role::create(['name' => $role]);
            
            $user = User::create([
                'name' => $rolesArray[$role]->name,
                'email' => $rolesArray[$role]->name.'@test.com',
                'email_verified_at' => now(),
                'password' => 'secret',
                'active' => '1',
                ]);
            Profile::create([
                'user_id' => $user->id,
                'contact' => [
                    'Gender' => 'Laki-laki',
                    'Address' => $faker->streetAddress,
                    'City' => $faker->city,
                    'Country' => $faker->country,
                    'Telephone' => $faker->phoneNumber,
                    ],
                ]);
            Auth::guard('web')->login($user);
            $user->assignRole($role); 
            Auth::guard('web')->logout();       
		}
	
		foreach ($permissions as $permission=>$authorized_roles) {
	
			$permissionInstance = Permission::create(['name' => $permission]);

			foreach ($authorized_roles as $role) {
				$rolesArray[$role]->givePermissionTo($permissionInstance);
			}
        }

        $categories = [
            ['name'=>'Fiqih','note'=>'Pengajian Tentang Fiqih'],
            ['name'=>'Tauhid','note'=>'Pengajian Tentang Tauhid'],
            ['name'=>'Tafsir','note'=>'Pengajian Tentang Tafsir'],
            ['name'=>'Tahsin','note'=>'Pengajian Tentang Tahsin'],
            ['name'=>'Tausiyah','note'=>'Pengajian Tausiah'],
            ['name'=>'Tahlil','note'=>'Pengajian Tentang Tahlil'],
            ['name'=>'Maulid Nabi','note'=>'Peringatan Maulid Nabi'],
            ['name'=>'Isra Mi\'raj','note'=>'Peringatan Isra Mi\'raj'],
            ['name'=>'Umum','note'=>'Pengajian Umum'],
          ];

          foreach ($categories as $category){
            Category::create($category);
          }

        $types = [
            ['name'=>'Masjid','note'=>'Pemasukan dan Pengeluaran Masjid'],
            ['name'=>'Pembangunan','note'=>'Pemasukan dan Pengeluaran Pembangunan'],
            ['name'=>'Zakat','note'=>'Pemasukan dan Pengeluaran Zakat'],
            ['name'=>'Ramadhan','note'=>'Pemasukan dan Pengeluaran Ramadhan'],
            ['name'=>'Lainnya','note'=>'Pemasukan dan Pengeluaran Lainnya'],
        ];

        foreach ($types as $type){
            FinanceType::create($type);
        }
    }
}
