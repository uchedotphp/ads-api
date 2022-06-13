<?php

namespace App\Http\Requests;

use App\Models\Popup;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PopupUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "idem" => ["required", Rule::exists((new Popup)->getTable(), "idem")],
            "data" => ["required", "array"]
        ];
    }
}
