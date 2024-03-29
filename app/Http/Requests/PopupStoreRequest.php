<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PopupStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "idem" => ["sometimes",],
            "data" => ["required", "array"],
        ];
    }
}
