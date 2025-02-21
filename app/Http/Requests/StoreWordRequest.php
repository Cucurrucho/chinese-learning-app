<?php

namespace App\Http\Requests;

use App\Models\Word;
use Illuminate\Foundation\Http\FormRequest;

class StoreWordRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'pinyin' => 'required|string',
            'meaning' => 'required|string',
            'hanzi' => ['regex:/\p{Han}+/u', 'required']
        ];
    }

    public function store(): Word {
        $word = new Word($this->all());
        $word->save();
        return $word;
    }
}
