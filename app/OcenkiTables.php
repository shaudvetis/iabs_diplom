<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OcenkiTables extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['id','user_id', 'id_seminar','id_seminarus','tema',
      'bal', 'lessons','element','morning','teor_nav'
    ];

public static function update_ocenki($id, $user_id, $id_seminar,$id_seminarus, $tema,$bal, $lessons){
        
       $proverka = OcenkiTables::where('id', $id)->get();
         if($proverka->isEmpty()){
              OcenkiTables::updateOrCreate([
            'user_id' => $user_id, 
            'id_seminar' => $id_seminar,
            'id_seminarus' => $id_seminarus,
            'tema' => $tema,
            'bal' => $bal,
            'lessons' => $lessons,
            
             ]);
         }
         else{
            OcenkiTables::find($id)->update([
            'user_id' => $user_id, 
            'id_seminar' => $id_seminar,
            'id_seminarus' => $id_seminarus,
            'tema' => $tema,
            'bal' => $bal,
            'lessons' => $lessons
                      
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
