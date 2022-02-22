<?php

declare(strict_types = 1);

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
{
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        if (request()->routeIs('files.store')) {
            $fileRule = 'required';
        } else if (request()->routeIs('files.update')) {
            $fileRule = 'nullable';
        }
        return [
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'slug' => [
                Rule::unique('files', 'slug')->ignore($this->file)->withoutTrashed(),
            ],
            'author' => [
                'nullable',
                'string',
                'max:255',
            ],
            'description' => [
                'required',
                'string',
                'max:255',
            ],
            'source' => [
                'nullable',
                'string',
                'max:255',
            ],
            'file' => [
                $fileRule,
                'file',
                'max:10000'
            ],
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'slug' => Str::slug($this->name)
        ]);
    }
}
