<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "title" => ['required', "string"],
            "author" => ['required', "string"],
            "book_file" => ['required',"file" ,"mimes:pdf"],
            "cover_image" => ['required', "file","mimes:jpg,png"],
            "sinopsis" => ['required', "string"],
            "category_id" => ['required', "numeric", "exists:categories,id"],
        ];
    }
}
