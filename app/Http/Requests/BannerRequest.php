<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        if (request()->routeIs('banners.store')) {
            $photoRule = 'required';
        } else if (request()->routeIs('banners.update')) {
            $photoRule = 'nullable';
        }

        return [
            'active' => [
                'boolean',
                'required',
            ],
            'title' => [
                'required',
                'string',
                'max:255',
            ],
            'slug' => [
                Rule::unique('banners', 'slug')->ignore($this->banner)->withoutTrashed(),
            ],
            'author' => [
                'nullable',
                'string',
                'max:255',
            ],
            'author_url' => [
                'nullable',
                'url',
                'string',
                'max:512',
            ],
            'source' => [
                'nullable',
                'string',
                'max:255',
            ],
            'source_url' => [
                'nullable',
                'url',
                'string',
                'max:512',
            ],
            'license' => [
                'nullable',
                'string',
                'max:255',
            ],
            'license_url' => [
                'nullable',
                'url',
                'string',
                'max:512',
            ],
            'photo' => [
                $photoRule,
                'file',
                'mimes:jpg,bmp,png,jpeg',
                'dimensions:min_width=1920,min_height=480',
                'max:10000',
            ],
        ];
    }

    public function messages() {
        return [
            'photo.dimensions' => 'Obrázok musí byť minimálne :min_width px široký a :min_height px vysoký.'
        ];
    }

    protected function prepareForValidation() {
        $state = $this->active ? 1 : 0;

        $this->merge([
            'active' => $state,
            'slug' => Str::slug($this->title)
        ]);

        Session::put(['banner_old_input_checkbox' => $state]);
    }
}
