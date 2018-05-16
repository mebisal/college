<?php

namespace App\Http\Requests\Ashok;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Ashok\Ffsdfsdf;

class UpdateFfsdfsdfRequest extends FormRequest
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
        return Ffsdfsdf::$rules;
    }
}
