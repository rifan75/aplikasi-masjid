<?php

namespace Modules\Admin\Http\Controllers\Dev;

use Modules\Admin\Http\Controllers\Controller;
use Modules\Admin\Http\Responses\Dev\ProgressIndexResponse;
use Modules\Admin\Http\Responses\Dev\ProgressCreateResponse;
use Modules\Admin\Http\Responses\Dev\ProgressShowResponse;
use Modules\Admin\Http\Responses\Dev\ProgressEditResponse;
use Modules\Admin\Http\Responses\Dev\ProgressProcessResponse;
use Modules\Admin\Http\Requests\Dev\ProgressRequest;
use Modules\Admin\Http\Repos\Dev\ProcessProgressRepoInterface;

class ProgressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(ProgressIndexResponse $response)
    {
        return $response;
    }

    public function create(ProgressCreateResponse $response)
    {
        return $response;
    }

    public function store(ProgressRequest $request, ProcessProgressRepoInterface $repo)
    {
        $progress = $repo->createProgressDefault($request);
       
        foreach ($request->input('image', []) as $file) {
          $progress->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('progress','s3');
      }

        return new ProgressProcessResponse();
    }

    public function show(ProgressShowResponse $response)
    {
        return $response;
    }

    public function edit($id)
    {
        return new ProgressEditResponse($id);
    }

    public function update(ProgressRequest $request, ProcessProgressRepoInterface $repo, $id)
    {
        $progress = $repo->updateProgressDefault($request, $id);

        if (count($progress->image) > 0) {
            foreach ($progress->image as $media) {
                if (!in_array($media->file_name, $request->input('image', []))) {
                    $media->delete();
                }
            }
        }
    
        $media = $progress->image->pluck('file_name')->toArray();
    
        foreach ($request->input('image', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $progress->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('progress','s3');
            }
        }

        return new ProgressProcessResponse();
    }

    public function delete(ProcessProgressRepoInterface $repo, $id)
    {
        $repo->deleteProgressDefault($id);
    }
}
