<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //share setting to all pages
        // $setting = Setting::first();
        // if (is_null($setting)) {
        //     $setting = Setting::create([
        //         'phone_number' => '0932485830',
        //         'about_us' => " tail resturant in damascus  build in 1999 march month  ",
        //         'image' => "nothing"
        //     ]);
        // }
        // $user = User::first();
        // view()->share(['user' => $user]);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
