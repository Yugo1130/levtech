<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Laravelでは、FormRequestというフォームから入力した項目を便利に取り扱うことが可能なクラスが存在する。
// 機能の一つに、リクエストで受け取った値のバリデーションが含まれる

class PostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'post.title' => 'required|string|max:100',
            'post.body' => 'required|string|max:4000',
        ];
    }
}
