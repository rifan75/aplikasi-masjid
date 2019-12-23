<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use DateTime;

class Lecture extends Model
{
    use SoftDeletes;
    protected $table = "lecture";
    protected $fillable = [
        'scholar',
        'title',
        'category',
        'status',
        'type',
        'day',
        'date',
        'from',
        'untill',
    ];

    public function getDaytransAttribute()
    {
        return Carbon::parse($this->attributes['day'])
        ->translatedFormat('l');
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

    public function getStatusAttribute()
    {   
        if ($this->attributes['status'])
        {
            return 'Aktif';
        }
        return 'Tidak Aktif';
    }
    
    public function setDateAttribute($value)
    {  
        $this->attributes['date'] = DateTime::createFromFormat('d M Y', $value)->format('Y-m-d');
    }
}
