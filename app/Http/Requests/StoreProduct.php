<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_category_id' => 'required|integer',
            'code' => 'required|string|max:20|unique:products',
            'name' => 'required|string|max:150|unique:products',
            'regular_price' => 'required|integer',
            'sell_price' => 'nullable|integer',
            'discount' => 'nullable|integer',
            'tax' => 'nullable|integer',
            'stock' => 'nullable|integer',
            'stock_status_id' => 'nullable|integer',
            'ordering' => 'nullable|integer',
            'material' => 'nullable|string|max:250',
            'tags' => 'nullable|string|max:250',
            'is_featured' => 'boolean',
            'is_publish' => 'boolean',
        ];
    }
}
