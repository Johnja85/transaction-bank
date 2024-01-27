<?php

namespace App\Http\Requests\Third_account;

use App\Models\ThirdAccount;
use Illuminate\Foundation\Http\FormRequest;

class PutRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'idaccount' => ['required', 'string', 'max:18'],
            'description' => ['required', 'string', 'max:255'],
            'name_third' => ['required', 'max:50'],
            'is_active' => ['required']
        ];
    }
}
