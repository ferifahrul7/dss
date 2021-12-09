<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BobotKriteriaStoreRequest extends FormRequest
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
            'bobot' => 'required|unique:bobot_kriteria,bobot',
            'keterangan' => 'required|min:3',
        ];
    }
}
