<?php

namespace App\Http\Requests\Transaction;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'account' => ['required', 'max:18'],
            'destination_account' => ['required', 'max:18', 'different:account'],
            'value' => ['required', 'numeric','min:0.01', 'no_greater_than_bd:account'],
            'observation' => ['required', 'string', 'max:50'],
            'type' => ['required']
        ];
    }

    public function messages(){

        return [
            'value.no_greater_than_bd' => 'The account value must not be greater than the maximum price allowed for the selected product.',
        ];
    }
}
