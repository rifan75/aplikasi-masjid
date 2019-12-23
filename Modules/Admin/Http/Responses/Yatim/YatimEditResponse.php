<?php
namespace Modules\Admin\Http\Responses\Yatim;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Yatim;

class YatimEditResponse implements Responsable
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
        return view('admin::yatim.yatim');
    }

    protected function DataTable()
    {
        $yatim = Yatim::where('id',$this->id)->first();
        
        $data = [
            'name' => ucfirst($yatim->name),
            'birth' => $yatim->birthedit,
            'gender' => $yatim->contact['Gender'],
            'address' => $yatim->contact['Address'],
            'city' => $yatim->contact['City'],
            'country' => $yatim->contact['Country'],
            'telephone' => $yatim->contact['Telephone'],
            'full_picture_path' => $yatim->getFirstMediaUrl('yatim')==null ? asset('images/picture.jpg') : $yatim->getFirstMediaUrl('yatim'),
            'note' => $yatim->note,
        ];
  
        echo json_encode($data);
    }
}