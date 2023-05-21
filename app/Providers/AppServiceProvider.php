<?php

namespace App\Providers;

use App\Http\Services\LogService;
use Illuminate\Support\Facades\Config;
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
        $this->app->bind(LogService::class,function ($app) {
            return new LogService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       Config::set('filesystems.disks.phpError' ,[
        'driver' => 'local',
        'root' => KANDD_PATH.'/Temp',
        'url' => env('APP_URL').'/storage',
        'visibility' => 'public',
        'throw' => false,
        ]);

    }
}
