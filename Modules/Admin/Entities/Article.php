<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Carbon\Carbon;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Article extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;
    protected $table = "article";
    protected $fillable = [
        'user_id',
        'category',
        'title',
        'slug',
        'content',
    ];

    public function registerMediaCollections()
    {
        $this->addMediaCollection('article_head')
                ->singleFile();
        $this->addMediaCollection('article');
    }

    // protected $appends = [
    //     'date'
    // ];

    public function getShortContentAttribute()
    {
        return Str::words($this->content, 30, '... (Klik untuk lihat lebih detail)');
    }

    public function getDateAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
        ->translatedFormat('l, d F Y');
    }

    public function getHijrAttribute()
    {
        return \GeniusTS\HijriDate\Hijri::convertToHijri($this->attributes['created_at'])
        ->format('d F Y');
    }

    /**
     * Relationship.
     */
    public function user()
    {
        return $this->belongsTo('Modules\Admin\Entities\User','user_id','id');
    }
    
}
