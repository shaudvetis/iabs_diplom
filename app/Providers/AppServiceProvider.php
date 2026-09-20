<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Jenssegers\Date\Date;
use App\Http\ViewComposers\NapravleniaComposer;
use App\Http\ViewComposers\RozkladzComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); 
        Date::setlocale(config('app.locale'));
        
        //Отображается в курации перебор направлений
        view()->composer('layouts/napravleniya', NapravleniaComposer::class); //Это обозначает на какую вьюшку отправить выборку с тупекомпосер

         //Отображается в курации перебор направлений
        view()->composer('admink/layouts/app_admink', NapravleniaComposer::class); //Отправляем в шаблон страници преподавателя
         view()->composer('admink/reportmarks', NapravleniaComposer::class); //Отправляем в шаблон страници преподавателя
          //Отображается в странице где оценки для ввівода в печать и на странице
        view()->composer('admink/ocenki', NapravleniaComposer::class); //Отправляем в шаблон страници преподавателя

         //Отображается в странице где практ навички для ввівода в печать и на странице
        view()->composer('admink/clinichniobs/practnavuchka', NapravleniaComposer::class); //Отправляем в шаблон страници преподавателя

         //Отображается в странице где практ навички для ввівода в печать и на странице
        view()->composer('intern/archive_inputday', NapravleniaComposer::class); //Отправляем в шаблон страници преподавателя

        view()->composer('admink/kerivnuk/rozkladz', RozkladzComposer::class); //Отправляем в шаблон страници преподавателя заочное расписание

         view()->composer('admink/kerivnuk/include/brick-editrozkladzuser', RozkladzComposer::class); //Отправляем в шаблон страници преподавателя заочное расписание
    }
}
