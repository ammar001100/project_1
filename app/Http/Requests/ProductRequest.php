<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => ['required', 'string','max:15','unique:products,name'],
            'price' => ['required', 'numeric'],
            'price_sale' => ['required', 'numeric'],
            'stock' => ['required', 'integer'],
            'unit' => ['required','string','max:30'],
            'date_e' => ['required','date'],
            'date_p' => ['required', 'date'],
            'section_id' => ['required', 'integer'],
            'description' => ['max:140',],
        ];
    }
    public function messages(){
        return [
            'name.required' => 'الرجاء ادخال اسم المنتج',
            'name.string' => 'الاسم يجب ان يكون ارقام',
            'price.numeric' => '  السعر يجب ان يكون رقم',
            'price_sale.numeric' => '  سعر البيع يجب ان يكون رقم',
        ];
    }
}
