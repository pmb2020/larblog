<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

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
        //模板视图共享数据
        $configs=DB::table('configs')->get();
        foreach ($configs as $v){
            $config[$v->name]=$v->value;
        }
        View::share([
            'config'=>$config??'',
            'smallTitle'=>Str::before($config['web_title']??'','-')
        ]);
    }
}
