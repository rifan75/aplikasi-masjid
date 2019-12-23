<?php
namespace Modules\User\Http\Response;

use Illuminate\Contracts\Support\Responsable;
use Ramsey\Uuid\Uuid;


class ActivateResponse implements Responsable
{
    public function __construct($model, $uuid, $act)
    {
        $this->model = $model;
        $this->uuid = $uuid;
        $this->act = $act;
    }

    public function toResponse($request)
    {
        $uuid_byte = Uuid::fromString($this->uuid)->getBytes();
        $model = $this->model->where('uuid',$uuid_byte)->firstorFail();
        if($this->act==0){
            $model->update(['active' => 1]);
        }else{
            $model->update(['active' => 0]);
        }
    }
}