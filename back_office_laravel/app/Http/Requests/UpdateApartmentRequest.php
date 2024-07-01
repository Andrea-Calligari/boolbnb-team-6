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
            //'title' => 'required|string|max:255',
            //'description' => 'nullable|string|max:1000',
            //'slug' => ['required', 'max:255', Rule::unique('apartments')->ignore($this->apartment)],
            //'price' => 'required|numeric|min:0|max:9999.99',
            //'rooms_number' => 'required|numeric|integer|max:255',
            //'beds_number' => 'required|numeric|integer|max:255',
            //'baths_number' => 'required|numeric|integer|max:255',
            //'mtq' => 'required|numeric|integer|max:150',
            //'address' => 'required|string|max:255',
            //'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            //'visible' => 'boolean',
            //'category_id' => 'required|exists:categories,id',
            //'services' => 'nullable|array',
            //'services.*' => 'exists:services,id',
            //'promotions' => 'nullable|array',
            //'promotions.*' => 'exists:promotions,id',
        ];
    }
}
