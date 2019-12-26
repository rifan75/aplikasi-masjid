<?php

namespace Modules\Admin\Http\Controllers\Dev;

use Modules\Admin\Http\Controllers\Controller;
use Modules\Admin\Http\Responses\Dev\DevIndexResponse;
use Modules\Admin\Http\Responses\Dev\DevCreateResponse;
use Modules\Admin\Http\Responses\Dev\DevShowResponse;
use Modules\Admin\Http\Responses\Dev\DevEditResponse;
use Modules\Admin\Http\Responses\Dev\DevProcessResponse;
use Modules\Admin\Http\Requests\Dev\DevRequest;
use Modules\Admin\Http\Repos\Dev\ProcessDevRepoInterface;

class DevController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(DevIndexResponse $response)
    {
        return $response;
    }

    public function create(DevCreateResponse $response)
    {
        return $response;
    }

    public function store(DevRequest $request, ProcessDevRepoInterface $repo)
    {
        $dev = $repo->createDevDefault($request);
       
        foreach ($request->input('document', []) as $file) {
            $dev->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('document','s3');
        }

        foreach ($request->input('design', []) as $file) {
          $dev->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('design','s3');
        }

        return new DevProcessResponse();
    }

    public function show(DevShowResponse $response)
    {
        return $response;
    }

    public function edit($id)
    {
        return new DevEditResponse($id);
    }

    public function update(DevRequest $request, ProcessDevRepoInterface $repo, $id)
    {
        $dev = $repo->updateDevDefault($request, $id);

        if (count($dev->document) > 0) {
            foreach ($dev->document as $docu) {
                if (!in_array($docu->file_name, $request->input('document', []))) {
                    $docu->delete();
                }
            }
        }

        if (count($dev->design) > 0) {
            foreach ($dev->design as $media) {
                if (!in_array($media->file_name, $request->input('design', []))) {
                    $media->delete();
                }
            }
        }

        $docu = $dev->document->pluck('file_name')->toArray();
        $media = $dev->design->pluck('file_name')->toArray();

        foreach ($request->input('document', []) as $file) {
            if (count($docu) === 0 || !in_array($file, $docu)) {
                $dev->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('document','s3');
            }
        }
        foreach ($request->input('design', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $dev->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('design','s3');
            }
        }

        return new DevProcessResponse();
    }

    public function delete(ProcessDevRepoInterface $repo, $id)
    {
        $repo->deleteDevDefault($id);
    }
}
