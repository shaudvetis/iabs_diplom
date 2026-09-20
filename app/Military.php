<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Military extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['id','user_id', 'id_seminar','id_seminarus','tema',
      'bal', 'lessons','element','morning','teor_nav'
    ];

     protected $table = 'military';

public static function update_ocenki($id, $user_id, $id_seminar,$id_seminarus, $tema,$bal, $lessons,$element){
        
       $proverka = Military::where('id', $id)->get();
         if($proverka->isEmpty()){
              Military::updateOrCreate([
            'user_id' => $user_id, 
            'id_seminar' => $id_seminar,
            'id_seminarus' => $id_seminarus,
            'tema' => $tema,
            'bal' => $bal,
            'lessons' => $lessons,
            'element' => $element
                  ]);
         }
         else{
            Military::find($id)->update([
            'user_id' => $user_id, 
            'id_seminar' => $id_seminar,
            'id_seminarus' => $id_seminarus,
            'tema' => $tema,
            'bal' => $bal,
            'lessons' => $lessons,
            'element' => $element
                      
        ]);
         }
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function userprofiles()
    {
        return $this->belongsTo(UserProfile::class);
    }
   public function seminartema()
    {
        return $this->belongsTo(SeminarTema::class);
    }

}
