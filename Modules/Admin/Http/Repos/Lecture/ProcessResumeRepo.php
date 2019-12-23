<?php
namespace Modules\Admin\Http\Repos\Lecture;

use Modules\Admin\Http\Repos\Lecture\ProcessResumeRepoInterface;
use Modules\Admin\Entities\Resume;
use Auth;

class ProcessResumeRepo implements ProcessResumeRepoInterface
{
    public function __construct()
    {
        //
    }

    public function createResumeDefault($resumeData)
    {
        $detail=$resumeData->content;
        $dom = new \DomDocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $image_name= "/upload/" . time().$k.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $data);
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }
        $content = $dom->saveHTML();
        
        $data = [
            'user_id'  =>   Auth::user()->id,
            'scholar'  =>   $resumeData->scholar,
            'lecture_id'   =>   $resumeData->lecture_id,
            'title'  =>   $resumeData->title,
            'video'   =>   $resumeData->video,
            'slug'   =>   $resumeData->slug,
            'date'  =>   $resumeData->date,
            'content'   =>  $content,
        ];

        $resume = Resume::create($data);
        
        return $resume;
    }

    public function updateResumeDefault($resumeData, $id)
    { 
        $data = [
            'scholar'  =>   $resumeData->scholar,
            'title'  =>   $resumeData->title,
            'category'   =>   $resumeData->category,
            'type'  =>   $resumeData->type,
            'day'   =>   $resumeData->day,
            'date'  =>   $resumeData->date?$resumeData->date:'01 July 1999',
            'from'   =>   $resumeData->from,
            'untill'    =>   $resumeData->untill,
        ];
        $resume = Resume::where('id',$id)->first();
        $resume->update($data);
        return $resume;   
    }

    public function deleteResumeDefault($id)
    { 
        $resume = Resume::where('id',$id)->first();
        $resume->delete();
        return $resume;   
    }
}