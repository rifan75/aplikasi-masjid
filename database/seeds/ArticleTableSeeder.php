<?php

use Illuminate\Database\Seeder;
use Modules\Admin\Entities\User;
use Modules\Admin\Entities\Article;
use Modules\Admin\Entities\Profile;

class ArticleTableSeeder extends Seeder
{
   /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class,5)->create()->each(function ($user) {
            factory(Profile::class)->create(['user_id'=>$user->id]);
            $user->assignRole('writer');
            factory(Article::class,5)->create(['user_id'=>$user->id]);
        });
    }
}
