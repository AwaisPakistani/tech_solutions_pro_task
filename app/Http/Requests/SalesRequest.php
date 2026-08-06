<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'country' => 'required|string|max:255',
            'item_type' => 'required|string|max:255',
            'sales_channel' => 'required|string|max:255',
            'order_id' => 'required|string|max:255',
            'unit_price' => 'required|numeric|min:0',
            'total_profit' => 'required|numeric|min:0',
        ];
    }
}
