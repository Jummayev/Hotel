<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'region' => ['required'],
            'phoneNumber' => ['required'],
            'county'  => ['required'],
            'venueAddress'  => ['required'],
            'name'  => ['required'],
            'type'  => ['required'],
            'roomCount'  => ['required'],
            'email'  => ['required'],
            'amount'  => ['required'],
            'images' => ['required']
        ];
    }
}
