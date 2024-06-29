<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateApartmentRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'nullable|max:1000',
            'slug' => ['required', 'max:255', Rule::unique('apartments')->ignore($this->apartment)],
            'price' => 'decimal:2,4',
            'rooms_number' => 'integer|numeric|max_digits:10',
            'beds_number' => 'integer|numeric|max_digits:10',
            'baths_number' => 'integer|numeric|max_digits:10',
            'mtq' => 'integer',
            'address' => 'string',
            'latitude' => 'decimal:11,6',
            'longitude' => 'decimal:11,6',
            'image' => 'string',
            'visible' => 'boolean',
            'user_id' => 'exists:users,id',
            'category_id' => 'exists:users,id',
            'services_id' => 'nullable|exists:users,id',
            'promotions_id' => 'nullable|exists:users,id',
        ];
    }
}
