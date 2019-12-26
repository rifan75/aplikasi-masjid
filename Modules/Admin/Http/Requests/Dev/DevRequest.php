<?php

namespace Modules\Admin\Http\Requests\Dev;

use Illuminate\Foundation\Http\FormRequest;
use Waavi\Sanitizer\Laravel\SanitizesInput;
use Illuminate\Validation\Rule;

class DevRequest extends FormRequest
{
    use SanitizesInput;
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
        if ($this->method() == 'PATCH')
        {
            
            return [
                'name' => 'required',
                'slug' => ['required','alpha_dash','unique:development,slug,' .$this->route('id')],
              ];
        }

        return [
        'name' => 'required',
        'slug' => 'required|alpha_dash|unique:development',
        ];
    }
    /**
     * Filter Data and Modif that apply to the request.
     *
     * @return array
     */
    public function filters()
    {
        return [
            //
        ];
    }
    
}
