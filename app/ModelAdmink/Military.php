<?php

namespace App\ModelAdmink;

use Illuminate\Database\Eloquent\Model;

class Military extends Model
{
    protected $fillable = ['user_id','id','id_seminar','id_seminarus', 'tema','element', 'bal','morning','lessons', 'teor_bal','kafedra'];
     protected $table = 'military';

     public static function update_ocenki($id, $user_id, $id_seminar,$id_seminarus, $tema,$bal, $lessons){
        
       $proverka = Military::where('id', $id)->get();
         if($proverka->isEmpty()){
              Military::updateOrCreate([
            'user_id' => $user_id, 
            'id_seminar' => $id_seminar,
            'id_seminarus' => $id_seminarus,
            'tema' => $tema,
            'bal' => $bal,
            'lessons' => $lessons,
            
             ]);
         }
         else{
            Military::find($id)->update([
            'user_id' => $user_id, 
            'id_seminar' => $id_seminar,
            'id_seminarus' => $id_seminarus,
            'tema' => $tema,
            'bal' => $bal,
            'lessons' => $lessons
                      
        ]);
         }
    }
}
