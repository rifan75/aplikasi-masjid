<?php

namespace Modules\Frontend\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Yatim extends Model
{
    use SoftDeletes;
    protected $table = "list_yatim";
    protected $casts=[
        'contact'=>'array'
    ];
    protected $fillable = [
        'name',
        'birth',
        'note',
        'status',
        'contact',
        'witness',
        'given',
    ];

    protected $appends = [
        'age'
    ];

    public function getBirthAttribute()
    {
        return Carbon::parse($this->attributes['birth'])
        ->translatedFormat('l, d F Y');
    }

    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['birth'])
        ->diff(Carbon::now())->format('%y Tahun, %m Bulan and %d Hari');
    }
}
