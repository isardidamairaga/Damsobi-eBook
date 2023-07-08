<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            "title" => ["string"],
            "book_file" => ["file", "mimes:pdf", "max:2092"],
            "cover_image" => ["file", "mimes:jpg,png", "max:2092"],
            "sinopsis" => ["string"],
            "category_id" => ["exists:categories,id"],
        ];
    }
}
