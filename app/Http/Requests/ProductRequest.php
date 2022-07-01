<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category_id' => 'required|string|exists:categories,id',
            'title' => 'required|string|min:5|max:50|unique:products,title',
            'picture' => 'image|mimes:jpg,png,jpeg',
            'price' => 'required|numeric'
        ];
    }

}