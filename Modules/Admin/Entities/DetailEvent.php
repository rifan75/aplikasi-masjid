<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use DateTime;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class DetailEvent extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;
    protected $table = "detail_event";
    protected $fillable = [
        'event_id',
        'slug',
        'note',
    ];

    public function registerMediaCollections()
    {
        $this->addMediaCollection('event');
    }

    public function event()
    {
        return $this->belongsTo('Modules\Admin\Entities\Event','event_id','id');
    }

    public function attachments()
    {
        return $this->media()->where('collection_name', 'event');
    }
}
