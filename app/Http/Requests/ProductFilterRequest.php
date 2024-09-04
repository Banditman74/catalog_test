<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFilterRequest extends FormRequest
{
    public function authorize(): true
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'properties' => 'sometimes|array',
            'properties.*' => 'array',
            'properties.*.*' => 'string|distinct',
            'page' => 'integer|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'properties.array' => 'Параметр properties должен быть массивом.',
            'properties.*.array' => 'Каждое свойство в properties должно быть массивом.',
            'page.integer' => 'Номер страницы должен быть целым числом.',
            'page.min' => 'Номер страницы должен быть не меньше 1.',
            'per_page.integer' => 'Количество элементов на странице должно быть целым числом.',
            'per_page.min' => 'Количество элементов на странице должно быть не меньше 1.',
        ];
    }
}
