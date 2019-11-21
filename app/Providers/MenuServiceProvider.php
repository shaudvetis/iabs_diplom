<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    //Top menu for users

    public function topMenu() {

View::composer('layouts.base', function ($view) {
    $view->with('menu', \App\Menus::orderBy('id')->get()->groupBy('parent_id'));
});
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->topMenu();
    }
}


