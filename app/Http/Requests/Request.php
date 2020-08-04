<?php

namespace App\Http\Requests;

//use Illuminate\Foundation\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [
           'diagnoses'=>'required|max:255',
                'num_card'=>'required|:unique:inputforms',
                'apdate'=>'required',
        ];
    }

}
