<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentStoreRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'receipt_id' => ['required', 'exists:receipts,id'],
            'total_payment' => ['required', 'numeric'],
            'total_price' => ['required', 'numeric'],
            'total_change' => ['required', 'numeric'],
        ];
    }
}
