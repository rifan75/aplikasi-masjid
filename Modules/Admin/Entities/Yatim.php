<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Carbon\Carbon;
use DateTime;

class Yatim extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;
    protected $table = "list_yatim";
    protected $fillable = [
        'name',
        'birth',
        'note',
        'status',
        'contact',
        'witness',
        'given',
    ];
    
    protected $casts=[
        'contact'=>'array',
        'witness'=>'array',
        'given'=>'array'
    ];
    
    /**
     * Media Library.
     */
    public function registerMediaCollections()
    {
        $this->addMediaCollection('yatim')
                ->singleFile();
    }

    protected $appends = [
        'age','birthedit'
    ];

    public function getBirthAttribute()
    {
        return Carbon::parse($this->attributes['birth'])
        ->translatedFormat('l, d F Y');
    }

    public function getBirtheditAttribute()
    {
        return Carbon::parse($this->attributes['birth'])
        ->format('d F Y');
    }

    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['birth'])
        ->diff(Carbon::now())->format('%y Tahun, %m Bulan and %d Hari');
    }

    public function setBirthAttribute($value)
    {
        $this->attributes['birth'] = DateTime::createFromFormat('d M Y', $value)->format('Y-m-d');
    }
}
