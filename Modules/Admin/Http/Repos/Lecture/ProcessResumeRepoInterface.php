<?php
namespace Modules\Admin\Http\Repos\Lecture;

interface ProcessResumeRepoInterface 
{
    public function createResumeDefault($resumeData);
    public function updateResumeDefault($resumeData, $id);
    public function deleteResumeDefault($id);
    public function createagreeResumeDefault($resumeData);
    public function updateagreeResumeDefault($id,$artId);
}