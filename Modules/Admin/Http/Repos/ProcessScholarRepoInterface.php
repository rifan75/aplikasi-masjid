<?php
namespace Modules\Admin\Http\Repos;

interface ProcessScholarRepoInterface 
{
    public function createScholarDefault($scholarData);
    public function updateScholarDefault($scholarData, $id);
    public function deleteScholarDefault($id);
}