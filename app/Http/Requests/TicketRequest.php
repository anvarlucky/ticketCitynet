<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title'=>'required',
            'description'=>'required',
            'contacts'=>'required',
/*            'department_id' => 'required',
            'user_id' => 'required',*/
        ];
    }
}