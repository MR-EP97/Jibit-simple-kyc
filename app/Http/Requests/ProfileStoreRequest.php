<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class ProfileStoreRequest extends FormRequest
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
            'national_id' => 'required|string|size:10|unique:App\Models\Profile,national_id',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:512',
            'birth_date' => 'required|date|before:today',
        ];
    }

    protected function passedValidation(): void
    {
        Storage::disk('local')->put('avatars', $this->file('avatar'));
    }

    public function validated($key = null, $default = null)
    {
        return array_merge(parent::validated($key, $default), [
//            'user_id' => $this->user()->id
            'user_id' => 1,
            'avatar' => $this->file('avatar')->hashName()
        ]);
    }

}
