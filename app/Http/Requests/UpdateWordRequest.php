<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWordRequest extends FormRequest {
    private $word;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        $this->word = $this->route('word');
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

    public function update() {
        $this->word->update($this->all());
        return $this->word;
    }
}
