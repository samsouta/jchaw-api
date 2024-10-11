<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();
        if($method == 'PUT'){
            return [
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'required|string|url', // Ensure the image is a valid URL
                'price' => 'required|numeric|min:0', // Price should be numeric and non-negative
                'category' => 'required|string|max:255',
                'rating' => 'required|array', // Ensure rating is an array
                'rating.rate' => 'required|numeric|min:0|max:5', // Rating should be a number between 0 and 5
                'rating.count' => 'required|integer|min:0', // Count should be a non-negative integer
            ];
        }else {
            return [
                'title' => ['sometimes', 'required'],
                'description' =>['sometimes', 'required'],
                'image' => ['sometimes', 'required'], // Ensure the image is a valid URL
                'price' => ['sometimes', 'required'], // Price should be numeric and non-negative
                'category' => ['sometimes', 'required'],
                'rating' => ['sometimes', 'required'], // Ensure rating is an array
                'rating.rate' => ['sometimes', 'required'], // Rating should be a number between 0 and 5
                'rating.count' => ['sometimes', 'required'], // Count should be a non-negative integer
            ];
        }
        
    }
}
