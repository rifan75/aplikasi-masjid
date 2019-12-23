<?php
namespace Modules\Admin\Http\Responses\Scholar;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Scholar;

class ScholarEditResponse implements Responsable
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
        return view('admin::scholar');
    }

    protected function DataTable()
    {
        $scholar = Scholar::where('id',$this->id)->first();
        
        $data = [
            'name' => ucfirst($scholar->name),
            'gender' => $scholar->contact['Gender'],
            'address' => $scholar->contact['Address'],
            'city' => $scholar->contact['City'],
            'country' => $scholar->contact['Country'],
            'telephone' => $scholar->contact['Telephone'],
            'full_picture_path' => $scholar->getFirstMediaUrl('scholar')==null ? asset('images/picture.jpg') : $scholar->getFirstMediaUrl('scholar'),
            'note' => $scholar->note,
        ];
  
        echo json_encode($data);
    }
}