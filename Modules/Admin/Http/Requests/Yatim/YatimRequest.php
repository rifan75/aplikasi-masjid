<?php

namespace Modules\Admin\Http\Requests\Yatim;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Waavi\Sanitizer\Laravel\SanitizesInput;

class YatimRequest extends FormRequest
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
                'name' => ['required','unique:list_yatim,name,' .$this->route('id')],
                'picture' => 'mimes:jpeg,bmp,png|max:1024',
              ];
        }
        return [
            'name' => 'required','max:255','unique:list_yatim',
            'picture' => 'mimes:jpeg,bmp,png|max:1024',
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
            'name'  => 'trim|capitalize',
            'email' => 'trim'
        ];
    }
    
}
