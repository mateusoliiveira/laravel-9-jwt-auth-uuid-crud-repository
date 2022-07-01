<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'title' => 'required|string|min:5|max:50|unique:categories,title',
            'picture' => 'image|mimes:jpg,png,jpeg'
        ];
    }

}