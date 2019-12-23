<?php

namespace Modules\Admin\Http\Controllers\Finance;

use Modules\Admin\Http\Controllers\Controller;
use Modules\Admin\Http\Responses\Finance\DonationIndexResponse;
use Modules\Admin\Http\Responses\Finance\DonationEditResponse;
use Modules\Admin\Http\Responses\Finance\DonationProcessResponse;
use Modules\Admin\Http\Requests\Finance\DonationRequest;
use Modules\Admin\Http\Repos\Finance\ProcessDonationRepoInterface;

class DonationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(DonationIndexResponse $index)
    {
        return $index;
    }

    public function create()
    {
        //
    }

    public function store(DonationRequest $request, ProcessDonationRepoInterface $repo)
    {
        $repo->createDonationDefault($request);

        return new DonationProcessResponse();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return new DonationEditResponse($id);
    }

    public function update(DonationRequest $request, ProcessDonationRepoInterface $repo, $id)
    {
        $repo->updateDonationDefault($request, $id);

        return new DonationProcessResponse();
    }

    public function delete(ProcessDonationRepoInterface $repo, $id)
    {
        $repo->deleteDonationDefault($id);
    }
}
