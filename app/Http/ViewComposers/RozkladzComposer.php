<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\UserProfile;
use App\ModelSeminar\Bazainternatyr;


class RozkladzComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('user', UserProfile::select('surname', 'name','user_id','course','startyear')->where('course', '<=', '3')->orderby('course','desc')->orderby('surname','asc')->get());

        $view->with('baza', Bazainternatyr::select('id', 'name_baza')->get());

    }
}