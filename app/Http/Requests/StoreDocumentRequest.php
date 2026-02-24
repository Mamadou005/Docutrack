<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentRequest extends FormRequest
{
    // TRÈS IMPORTANT : Change false en true pour autoriser l'envoi
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'file_path' => 'required|file|mimes:pdf,jpg,png|max:10240', // Ici aussi : file_path
            'description' => 'nullable|string',
        ];
    }
}
