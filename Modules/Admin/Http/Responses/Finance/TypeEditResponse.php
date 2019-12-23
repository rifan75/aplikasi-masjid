<?php
namespace Modules\Admin\Http\Responses\Finance;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Type;

class TypeEditResponse implements Responsable
{
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        if($request->ajax()){
            return $this->DataTable();
        }
        return view('admin::finance.type');
    }

    protected function DataTable()
    {
        $type = Type::where('id',$this->id)->first();
        
        $data = [
            'name' => ucfirst($type->name),
            'note' => $type->note,
        ];
  
        echo json_encode($data);
    }
}