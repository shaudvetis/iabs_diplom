<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'fio' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'clordinator'=>['integer'],
            'course'=>['integer'],
            'kafedra'=>['integer'],
            'form'=>['string']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {   
         $fio = $data['fio'];
         $name=mb_substr($data['name'], 0,1,"utf-8");
         $surname=mb_substr($data['surname'], 0,1,"utf-8");
// dump($name);
// exit();
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'course'=>$data['course'],
            'form'=>$data['form'],
            'kafedra'=>$data['kafedra'],
            'surname'=>$data['surname'],
            'fio'=>$data['fio'],
            'role'=>$data['role'],
            'clordinator'=>$data['clordinator'],
            'password' => Hash::make($data['password']),
            'textpass' =>$data['password'],
            'name_short' => $fio.' '.$name.'.'.$surname,

        ]);

    }
}
