<?php

namespace App\Http\Controllers\Napravleniya;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Inputformsday;
use Auth;
use App\User;
use App\Formssurgeryday;

class Yrologia extends Controller
{
    public function getYrologia(Request $request) {


        {
            $data = [];

            // Get current auth user-student
            $student = Auth::user();



            // If current auth user not set - abort - page 404
            if (!$student) {
                abort(404);
            }

            // Get all inputforns from DB with student_id == current student id
            $forms = Inputformsday::where('id_student', $student->id)->get();

            // Add to each form object his user object in user field
            foreach ($forms as &$form) {
                $form->user = User::find($student->id);
            }

            // Add data to data array for view
            $this->data['inputformsday'] = $forms;
            $this->data['student'] = $student;

            $id_user= $request->user_id;

            $model_course = new Formssurgeryday;
            $details = $model_course->with([ //ЭТО ДЛЯ ОТОБРАЖЕНИЯ - С hasOne('App\AtestatProfile') ИЗ МОДЕЛИ Course С where 'user_id' = $id_user
                'Formssurgeryday' => function ($q) use ($id_user) {
                    $q->select('user_id', 'direction', 'num_card')->where('user_id', $id_user);
                }
            ]);


            // Render view
            return view('cherevnaocho',$this->data)->with('details', $details);
        }

    }
}
