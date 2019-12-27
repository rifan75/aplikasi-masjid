<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use DateTime;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Progress extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;
    protected $table = "progress";
    protected $fillable = [
        'dev_id',
        'date',
        'description',
    ];

    public function registerMediaCollections()
    {
        $this->addMediaCollection('progress');
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

    public function getDaterawAttribute()
    {
        return $this->attributes['date'];
    }

    public function setDateAttribute($value)
    {  
        $this->attributes['date'] = DateTime::createFromFormat('d M Y', $value)->format('Y-m-d');
    }

    public function dev()
    {
        return $this->belongsTo('Modules\Admin\Entities\Dev','dev_id','id');
    }

    public function image()
    {
        return $this->media()->where('collection_name', 'progress');
    }
}
