<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\StoreInfo;

class StoreInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;      
    }

    /**
     * Get the validation messages that apply to the erroneous request.
     *
     * @return bool
     */
    public function messages()
    {
        return [
            'outlet_id.required' => 'Outlet is required.',
            'category_id.required' => 'Category is required.',
            'sub_category_id.required' => 'Sub category is required.',
            'color_id.required' => 'Color is required.',
            'size_id.required' => 'Size is required.',
            'item_code_or_description.required' => 'Item code is required.',
            'quantity.required' => 'Quantity is required.',
            'rate.required' => 'Rate is required.'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'outlet_id' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'color_id' => 'required',
            'size_id' => 'required',
            'item_code_or_description' => 'required',
            'quantity' => [
                'required',
                'min:1',
                'max:8'
            ],
            'rate' => [
                'required',
                'min:1',
                'max:8'
            ]
        ];
    }
}
