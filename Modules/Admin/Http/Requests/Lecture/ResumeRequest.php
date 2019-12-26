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
                'slug' => ['required','alpha_dash','unique:content_lecture,slug,' .$this->route('id')],
                'content' => 'required',
                'scholar' => 'required',
                'img_resume_1' => 'mimes:jpeg,bmp,png|max:1024',
                'img_resume_2' => 'mimes:jpeg,bmp,png|max:1024',
                'img_resume_3' => 'mimes:jpeg,bmp,png|max:1024',
              ];
        }

        return [
        'title' => 'required',
        'slug' => 'required|alpha_dash|unique:content_lecture',
        'content' => 'required',
        'scholar' => 'required',
        'img_resume_1' => 'mimes:jpeg,bmp,png|max:1024',
        'img_resume_2' => 'mimes:jpeg,bmp,png|max:1024',
        'img_resume_3' => 'mimes:jpeg,bmp,png|max:1024',
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
