<?php

namespace Modules\Admin\Http\Requests\Dev;

use Illuminate\Foundation\Http\FormRequest;
use Waavi\Sanitizer\Laravel\SanitizesInput;
use Illuminate\Validation\Rule;

class ProgressRequest extends FormRequest
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
                'dev_id' => 'required',
                'date' =>   'required|uniquedate:'.$this->input('dev_id').','.$this->route('id')
            ];
        }
        
        return [
            'dev_id' => 'required',
            'date' =>   'required|uniquedate:'.$this->input('dev_id')
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
