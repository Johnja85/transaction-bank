<?php

namespace App\Http\Requests\Transaction;

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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'account' => ['required', 'string', 'max:18'],
            'destination_account' => ['required', 'string', 'max:18', 'different:account'],
            'balance' => ['required', 'max:50', 'numeric','min:0.01'],
        ];
    }
}
