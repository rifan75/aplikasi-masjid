<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ArticleAgree extends Model
{
    protected $table = "article_agree";
    protected $fillable = [
        'article_id',
        'user_id',
        'date',
        'agree',
    ];


    public function getDateAttribute()
    {
        return Carbon::parse($this->attributes['date'])
        ->translatedFormat('l, d-m-Y H:i:s');
    }

    /**
     * Relationship.
     */
    public function user()
    {
        return $this->belongsTo('Modules\Admin\Entities\User','user_id','id');
    }

    public function article()
    {
        return $this->belongsTo('Modules\Admin\Entities\Article','article_id','id');
    }
    
}
