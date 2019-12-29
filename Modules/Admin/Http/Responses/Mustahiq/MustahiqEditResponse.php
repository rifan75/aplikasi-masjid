<?php
namespace Modules\Admin\Http\Responses\Mustahiq;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Mustahiq;

class MustahiqEditResponse implements Responsable
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
        return view('admin::mustahiq.mustahiq');
    }

    protected function DataTable()
    {
        $mustahiq = Mustahiq::where('id',$this->id)->first();
        
        $data = [
            'name' => $mustahiq->name,
            'type' => $mustahiq->type,
            'gender' => $mustahiq->contact['Gender'],
            'address' => $mustahiq->contact['Address'],
            'city' => $mustahiq->contact['City'],
            'country' => $mustahiq->contact['Country'],
            'telephone' => $mustahiq->contact['Telephone'],
            'full_picture_path' => $mustahiq->getFirstMediaUrl('mustahiq')==null ? asset('images/picture.jpg') : $mustahiq->getFirstMediaUrl('mustahiq'),
            'note' => $mustahiq->note,
        ];
  
        echo json_encode($data);
    }
}