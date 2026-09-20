<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AtestatProfile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['id','user_id', 'course_id',
     'credits', 'hours', 'marks','nac_grade', 'ects_grade','course_title','id_name','total_marks','all_grade','course3','course4','course5','course6' ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public static function update_infrom($id, $user_id, $course_id, $credits,$hours, $marks, $nac_grade, $ects_grade, $course3, $course4, $course5, $course6, $all_grade,  $total_marks){
        
       $proverka = AtestatProfile::where('id', $id)->get();
         if($proverka->isEmpty()){
              AtestatProfile::updateOrCreate([
            'user_id' => $user_id, 
            'course_id' => $course_id,
            'credits' => $credits,
            'hours' => $hours,
            'marks' => $marks,
            'nac_grade' => $nac_grade,
            'ects_grade' => $ects_grade,
            'course3' => $course3,
            'course4' => $course4,
            'course5' => $course5,
            'course6' => $course6,
            'all_grade' => $all_grade,
            'total_marks' => $total_marks
             ]);
         }
         else{
            AtestatProfile::find($id)->update([
            'user_id' => $user_id, 
            'course_id' => $course_id,
            'credits' => $credits,
            'hours' => $hours,
            'marks' => $marks,
            'nac_grade' => $nac_grade,
            'ects_grade' => $ects_grade,
            'course3' => $course3,
            'course4' => $course4,
            'course5' => $course5,
            'course6' => $course6,
            'all_grade' => $all_grade,
            'total_marks' => $total_marks            
        ]);
         }
    }
}
