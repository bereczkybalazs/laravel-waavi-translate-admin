<?php

namespace BereczkyBalazs\WaaviTranslateAdmin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TranslateRequest extends FormRequest
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
            'translate' => 'required|array|min:1'
        ];
    }
}
