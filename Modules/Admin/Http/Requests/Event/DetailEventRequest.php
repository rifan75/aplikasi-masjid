<?php

namespace Modules\Admin\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;
use Waavi\Sanitizer\Laravel\SanitizesInput;
use Illuminate\Validation\Rule;

class DetailEventRequest extends FormRequest
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
                'event_id' => 'required',
                'slug' => ['required','unique:detail_event,slug,' .$this->route('id')],
              ];
        }

        return [
        'event_id' => 'required',
        'slug' => 'required|unique:detail_event',
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
