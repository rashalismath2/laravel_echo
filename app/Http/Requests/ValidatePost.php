<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePost extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "body"=>"required|min:2|max:250"
        ];
    }
    public function messages(){
        return[
            "body:required"=>"Comment Body Is Required",
            "body:min"=>"Comment Body Should be Atleast 2 character long",
        ];
    }
}
