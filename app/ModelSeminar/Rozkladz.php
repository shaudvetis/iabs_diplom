<?php

namespace App\ModelSeminar;


use Illuminate\Database\Eloquent\Model;

class Rozkladz extends Model
{
  
  protected $fillable = ['id', 'user_id','form','bazainternatyr_id','otdeleniya_id','month','name_month', 'year','year_start','years', 'yearp', 'dates','datep', 'kafedra_id','comm', 'course'];

  protected $table = 'rozkladzs';

   public function user_profiles()
    {
        return $this->belongsTo('App\UserProfile', 'user_id', 'user_id');
    }
    public function  bazainternatyrs()
    {
        return $this->belongsTo('App\ModelSeminar\Bazainternatyr', 'bazainternatyr_id', 'id');
    }
    public function  otdeleniyas()
    {
        return $this->belongsTo('App\ModelSeminar\Otdeleniya', 'otdeleniya_id');
    }
}

