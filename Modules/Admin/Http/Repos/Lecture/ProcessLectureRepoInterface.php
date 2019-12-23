<?php
namespace Modules\Admin\Http\Repos\Lecture;

interface ProcessLectureRepoInterface 
{
    public function createLectureDefault($lectureData);
    public function updateLectureDefault($lectureData, $id);
    public function deleteLectureDefault($id);
}