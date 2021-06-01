<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJob extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',            
            'type' => 'required',            
            'slot' => 'required|integer',            
            'is_open' => 'required|boolean',            
        ];
    }
}
