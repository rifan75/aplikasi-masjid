<?php
namespace Modules\Admin\Http\Repos\Finance;

interface ProcessDonationRepoInterface 
{
    public function createDonationDefault($donationData);
    public function updateDonationDefault($donationData, $id);
    public function deleteDonationDefault($id);
}