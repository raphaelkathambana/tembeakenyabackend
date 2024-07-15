<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGroupHikeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'group_id' => 'required|exists:groups,id',
            'hike_id' => 'required|exists:hikes,id',
            'guide_id' => 'required|exists:users,id',
            'hike_date' => 'required|date',
            'hike_fee' => 'required|numeric',
        ];
    }
}
