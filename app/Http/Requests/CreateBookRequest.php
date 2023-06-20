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
            "book_file" => ['required', "mimes:pdf", "max:2092"],
            "cover_image" => ['required', "mimes:jpg,png", "max:2092"],
            "sinopsis" => ['required', "string"],
            "category_id" => ['required', "exists:categories,id"],
        ];
    }
}
