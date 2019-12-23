<?php
namespace Modules\Admin\Http\Repos;

use Modules\Admin\Http\Repos\ProcessMosqueRepoInterface;
use Modules\Admin\Entities\Mosque;
use Auth;

class ProcessMosqueRepo implements ProcessMosqueRepoInterface
{
    public function __construct()
    {
        //
    }

    public function updateMosqueDefault($mosqueData, $id)
    { 
        $contact = [
            'Address' => $mosqueData->address,
            'City' => $mosqueData->city,
            'Country' => $mosqueData->country,
            'Email' => $mosqueData->email,
            'Telephone' => $mosqueData->telephone,
        ];
        $organizer = [
            'chief' => $mosqueData->chief,
            'deputy_chief' => $mosqueData->deputy_chief,
            'imam' => $mosqueData->imam,
            'marbout' => $mosqueData->marbout,
            'treasury' => $mosqueData->treasury,
            'security' => $mosqueData->security,
            'consumsi' => $mosqueData->consumsi,
        ];
        $data = [
          "name"    => $mosqueData->name,
          "contact"   =>   $contact,
          "organizer" =>   $organizer,
          "history" =>   $mosqueData->history,
        ];
        $mosque = Mosque::where('id',$id)->first();
        $mosque->update($data);
        return $mosque;   
    }
}