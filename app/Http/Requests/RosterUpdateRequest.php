<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RosterUpdateRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'day' => 'required|date',
            'time' => 'required|in:9:00 am - 11:00 am,11:00 am - 1:00 pm,1:00 pm - 3:00 pm,3:00 pm - 5:00 pm',
        ];
    }
}
