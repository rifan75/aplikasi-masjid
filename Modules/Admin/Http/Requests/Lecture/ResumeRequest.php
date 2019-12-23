<?php

namespace Modules\Admin\Http\Requests\Lecture;

use Illuminate\Foundation\Http\FormRequest;
use Waavi\Sanitizer\Laravel\SanitizesInput;
use Illuminate\Validation\Rule;

class ResumeRequest extends FormRequest
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
                'title' => 'required',
                'slug' => ['required','unique:resume,slug,' .$this->route('id')],
                'content' => 'required',
                'scholar' => 'required',
              ];
        }

        return [
        'title' => 'required',
        'slug' => 'required',
        'content' => 'required',
        'scholar' => 'required',
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
