<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use DateTime;

class Event extends Model
{
    use SoftDeletes;
    protected $table = "event";
    protected $fillable = [
        'name',
        'title',
        'category',
        'status',
        'date',
        'from',
        'untill',
    ];

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

    public function getFromAttribute()
    {
        return Carbon::parse($this->attributes['from'])
        ->translatedFormat('H:i');
    }

    public function getUntillAttribute()
    {
        return Carbon::parse($this->attributes['untill'])
        ->translatedFormat('H:i');
    }

    public function setDateAttribute($value)
    {  
        $this->attributes['date'] = DateTime::createFromFormat('d M Y', $value)->format('Y-m-d');
    }

    public function detailevent()
    {
        return $this->hasOne('Modules\Admin\Entities\DetailEvent','event_id','id');
    }
}
