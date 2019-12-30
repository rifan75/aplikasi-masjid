<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cohensive\Embed\Facades\Embed;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DateTime;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Resume extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;
    protected $table = "content_lecture";
    protected $fillable = [
        'user_id',
        'lecture_id',
        'scholar',
        'date',
        'published',
        'title',
        'slug',
        'video',
        'content',
    ];
    protected $appends = [
        'hijr'
    ];

    public function getShortContentAttribute()
    {
        return Str::words($this->content, 30, '... (Klik untuk lihat lebih detail)');
    }

    public function getDateAttribute()
    {
        return Carbon::parse($this->attributes['date'])
        ->translatedFormat('l, d F Y');
    }

    public function getDateeditAttribute()
    {
        return Carbon::parse($this->attributes['date'])
        ->format('d F Y');
    }


    public function getHijrAttribute()
    {
        return \GeniusTS\HijriDate\Hijri::convertToHijri($this->attributes['date'])
        ->format('d F Y');
    }

    public function getVideoHtmlAttribute()
    {
        $embed = Embed::make($this->video)->parseUrl();

        if (!$embed)
            return '';

        $embed->setAttribute(['width' => 400]);
        return $embed->getHtml();
    }

    public function setDateAttribute($value)
    {  
        $this->attributes['date'] = DateTime::createFromFormat('d M Y', $value)->format('Y-m-d');
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('img_resume_1')
                ->singleFile();
        $this->addMediaCollection('img_resume_2')
                ->singleFile();
        $this->addMediaCollection('img_resume_3')
                ->singleFile();
    }

    /**
     * Relationship.
     */
    public function user()
    {
        return $this->belongsTo('Modules\Admin\Entities\User','user_id','id');
    }

    public function lecture()
    {
        return $this->belongsTo('Modules\Admin\Entities\Lecture','lecture_id','id');
    }

    public function agree()
    {
        return $this->hasMany('Modules\Admin\Entities\ResumeAgree','resume_id','id');
    }
}