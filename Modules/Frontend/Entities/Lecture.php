<?php

namespace Modules\Frontend\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Lecture extends Model
{
    use SoftDeletes;
    protected $table = "lecture";
    protected $attributes = [
        'scholar_id',
        'title',
        'type',
        'category_id',
        'day',
        'date',
        'from',
        'untill',
    ];
    protected $appends = [
        'hijr'
    ];

    public function getDayAttribute()
    {
        return Carbon::parse($this->attributes['day'])
        ->translatedFormat('l');
    }

    public function getStatusAttribute()
    {   
        if ($this->attributes['status'])
        {
            return 'Aktif';
        }
        return 'Tidak Aktif';
    }

    public function getDateAttribute()
    {
        return Carbon::parse($this->attributes['date'])
        ->translatedFormat('l, d F Y');
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

    public function getHijrAttribute()
    {
        return \GeniusTS\HijriDate\Hijri::convertToHijri($this->attributes['date'])
        ->format('d F Y');
    }
}
