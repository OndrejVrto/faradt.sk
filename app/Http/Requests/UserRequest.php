<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rules\Password;

class UserRequest extends BaseRequest
{
    public function rules(): array {
        return [
            'active' => [
                'boolean',
                'required',
            ],
            'nick' => [
                'required',
                Rule::unique('users', 'nick')->ignore($this->user),
            ],
            'email' => [
                'required',
                'string',
                'email:rfc,dns,filter',
                'max:255',
                Rule::unique('users', 'email')->ignore($this->user),
            ],
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'slug' => [
                'string',
                Rule::unique('users', 'slug')->ignore($this->user)->withoutTrashed(),
            ],
            'password' => [
                $this->requiredNullableRule(),
                'confirmed',
                'max:255',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
            'can_be_impersonated' => [
                'boolean',
            ],
            'photo_avatar' => [
                'nullable',
                'file',
                'mimes:jpg,bmp,png,jpeg,svg',
                'dimensions:min_width=100,min_height=100',
                'max:3000',
            ],
        ];
    }

    public function messages(): array {
        return [
            'photo_avatar.dimensions' => 'Obrázok musí byť minimálne :min_width px široký a :min_height px vysoký.',
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'slug' => Str::slug($this->name),
        ]);
    }
}
