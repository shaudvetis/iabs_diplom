<?php

namespace App\Http\Requests;

class ProfileRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $rules = [
            'surname' => 'bail|required|max:255',        
            'name' => 'bail|required|max:255',
            'lastname' => 'bail|required|max:255',              
            
        ];
    }
}
