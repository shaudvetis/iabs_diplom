<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\ModelIntern\Napravlenia;
use App\UserProfile;

use Auth;

class NapravleniaComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('direction', Napravlenia::select('id', 'direction')->where('views', '!=', '2')->orderBy('direction','asc')->get());

        $view->with('userCourse', UserProfile::select('course','user_id')->where('user_id',  Auth::user()->id)->first());

        $view->with('direction_ocenki', Napravlenia::select('napravlenias.id', 'direction', 'color_directions.name_color')
            ->leftjoin('color_directions', 'napravlenias.id', '=', 'color_directions.num_napravlenie')
            ->where('view_menu','1')
            ->orderby('npp','asc')->get());

    }
}
