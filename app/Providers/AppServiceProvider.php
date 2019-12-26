<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Entities\Progress;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('oldpassword', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value, current($parameters));
        });

        Validator::extend('uniquedate', function ($attribute, $value, $parameters, $validator) {
            count($parameters)>1?$parameters[1]:$parameters[1]=0;
            $dateservers = Progress::where('dev_id', $parameters[0])
                                    ->where('id','!=', $parameters[1])
                                    ->get();
            if($dateservers)
            {
                foreach ($dateservers as $dateserver)
                {
                    if ($value == $dateserver->dateedit)
                    {
                        return false;
                    }
                }
            }
            return true;
        });
    }
}
