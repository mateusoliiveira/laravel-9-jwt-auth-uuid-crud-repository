<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {   
        return [
            'product_id' => 'required|string|exists:products,id',
            'user_id' => 'required|string|exists:users,id',
            'head' => 'required|string|min:5|max:50',
            'body' => 'required|string|min:10|max:200'
        ];
    }

}