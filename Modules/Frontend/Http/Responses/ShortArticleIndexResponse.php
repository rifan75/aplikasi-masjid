<?php
namespace Modules\Frontend\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Modules\Frontend\Entities\Article;
use DataTables;
use Carbon\Carbon;

class ShortArticleIndexResponse implements Responsable
{
 

    public function toResponse($request)
    {
        $datenow = \GeniusTS\HijriDate\Date::now()->format('l, d F Y');
        
        $archive = Article::orderBy('created_at', 'desc')
        ->whereNotNull('created_at')
        ->get()
        ->groupBy(function(Article $article) {
            return $article->created_at->format('Y');
        })
        ->map(function ($item) {
            return $item
                ->sortByDesc('created_at')
                ->groupBy( function ( $item ) {
                    return $item->created_at->format('F');
                });
        });

        $year = $request->year;
        $month = $request->month;
        if($request->ajax()){
            return $this->DataTable($month,$year);
        }
        return view('frontend::shortarticle',compact('datenow','archive'));
    }

    public function DataTable($month,$year)
    {
        if ($month==0 && $year==0){
            $articles =  Article::orderBy('created_at','DESC')->get();
        }else{
            $date = date_parse($month);
            $articles =  Article::whereYear('created_at', '=', $year)
            ->whereMonth('created_at', '=', $date['month'])
            ->orderBy('created_at','DESC')->get();
        }
        
        $no = 0;
        $data = array();
        foreach ($articles as $article) {
            $no ++;
            $row = array();
            $row['no'] = $no;
            $row['content'] = '<a href="/article/'.$article->slug.'" style="color:black"><b>'.$article->user.'
                               <br>'.$article->date.' || '.$article->hijr.'</b><br><h3>'
                                .$article->title.'</h3>'.$article->short_content.'</a>';
            $data[] = $row;
        }

        return DataTables::of($data)->escapeColumns([])->make(true);
    }

}