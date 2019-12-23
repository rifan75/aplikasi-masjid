<?php
namespace Modules\Admin\Http\Responses\Article;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Article;

class ArticleCreateResponse implements Responsable
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
        return view('admin::lecture.article');
    }

    protected function DataTable()
    {
        $article = Article::where('id',$this->id)->first();
        
        $data = [
            'id' => $article->id,
            'scholar' => $article->scholar,
            'category' => $article->category,
            'title' => $article->title,
            'type' => $article->type,
            'day' => $article->day,
            'date' => $article->dateedit,
            'from' => $article->from,
            'untill' => $article->untill,
        ];
  
        echo json_encode($data);
    }
}