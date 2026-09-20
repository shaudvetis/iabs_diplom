<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Auth;
use Carbon\Carbon;
use DateTime;
use App\LastOnline;

class ActiveUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
   
    public function handle($request, Closure $next)
    {   

        if (auth()->guest()) {
            return $next($request);
       }

  //Определяем пользователя, Берем его ид
  $user = Auth::user()->id;
  // dump($user);
  // exit();
//Делаем запрос и берем последнюю запись по студенту
  $zapros = LastOnline::where("user_id", $user)
              ->orderby('id', 'desc')->first();
            // dump($zapros);
            // exit();
  
 if (empty($zapros))
{
     DB::table("last_onlines")
     ->where("user_id", $user)
     ->insert(["last_online_at" => Carbon::now(),
     'user_id'=> $user,
     'created_at'=>Carbon::now()]);
}
//Если больше часа тогда пишем в таблицу время
  $zapros = LastOnline::where("user_id", $user)
              ->orderby('id', 'desc')->first();
 if ($zapros->created_at->diffInHours(now()) !== 0  )  {
     DB::table("last_onlines")
     ->where("user_id", $user)
     ->insert(["last_online_at" => Carbon::now(),
     'user_id'=> $user,
     'created_at'=>Carbon::now(),
     'updated_at'=>1]);
    }

        return $next($request);
    }


}
