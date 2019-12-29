<?php
namespace Modules\Admin\Http\Responses;

use Illuminate\Contracts\Support\Responsable;


class ActivateResponse implements Responsable
{
    public function __construct($model, $id, $act)
    {
        $this->model = $model;
        $this->id = $id;
        $this->act = $act;
    }

    public function toResponse($request)
    {
        $model = $this->model->where('id',$this->id)->firstorFail();
        
        if($this->act==0){
            $model->update(['active' => 1]);
        }else{
            $model->update(['active' => 0]);
        }
    }
}