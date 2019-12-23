<?php
namespace Modules\Admin\Http\Responses\Finance;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Donation;

class DonationEditResponse implements Responsable
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
        return view('admin::finance.donation');
    }

    protected function DataTable()
    {
        $donation = Donation::where('id',$this->id)->first();

        if ($donation->form == 'lock_box')
        {
            $data = [
                'name' => $donation->name,
                'type' => $donation->type,
                'form' => $donation->form,
                'incharge' => $donation->contact['incharge'],
                'counter' => $donation->contact['counter'],
                'witness1' => $donation->contact['witness1'],
                'witness2' => $donation->contact['witness2'],
                'note' => $donation->note,
            ];
            
        }else{
            $data = [
                'name' => $donation->name,
                'type' => $donation->type,
                'form' => $donation->form,
                'received' => $donation->contact['received'],
                'confirmation' => $donation->contact['confirmation'],
                'note' => $donation->note,
            ];
        }
  
        echo json_encode($data);
    }
}