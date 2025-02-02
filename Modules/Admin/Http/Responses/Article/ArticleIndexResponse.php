<?php
namespace Modules\Admin\Http\Responses\Article;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Article;
use DataTables;


class ArticleIndexResponse implements Responsable
{
    public function toResponse($request)
    {
        $articles = Article::where('status',true);

        if($request->ajax()){
            return $this->DataTable();
        }
        return view('admin::article.article',compact('articles'));
    }
    public function DataTable()
    {
        $articles = Article::orderBy('id', 'desc')->get();
        
        $no = 0;
        $data = array();
        foreach ($articles as $article) {
        $no ++;
        $row = array();
        $row[] = $no;
        $row['id'] = $article->id;
        $row['writer'] = $article->user->name;
        $row['category'] = $article->category;
        $row['title'] = $article->title;
        $row['published'] = $article->published;
        $row['slug'] = $article->slug;
        if($article->published){
            $row['published'] = "<a href='#' onclick='editAct(\"".$article->id."\",\"".$article->published."\")'><i class='fa fa-check' title='edit'></i></a>";
        }else{
            $row['published'] = "<a href='#' onclick='editAct(\"".$article->id."\",\"".$article->published."\")'><i class='fa fa-ban' title='edit'></i></a>";
        }
        $row['preview'] = '<a href="/admin/article/'.$article->slug.'" id="createbutton" type="button" class=" btn-sm btn-success" style="margin-bottom:5px">'.__("admin::article.preview").'</a>';
        $row['action'] = "<a href='#' onclick='editForm(\"".$article->id."\")'><i class='fa fa-pencil-square-o'></i></a>
                        &nbsp;&nbsp;&nbsp;
                    <a href='#' onclick='deleteForm(\"".$article->id."\")' type='submit'><i class='fa fa-trash'></i></a>";
        $data[] = $row;
        }

        return DataTables::of($data)->escapeColumns([])->make(true);
    }
}