<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class SaleUpdateRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'country'        => ['required', 'string', 'max:255'],
        'item_type'      => ['required', 'string', 'max:255'],
        'sales_channel'  => ['required', 'string', 'max:255'],
        'order_id'       => [
            'required',
            'string',
            'max:255',
            Rule::unique('sales', 'order_id')->ignore($this->route('sale')),
        ],
        'unit_price'     => ['required', 'numeric', 'min:0'],
        'total_profit'   => ['required', 'numeric', 'min:0'],
        ];
    }
}
