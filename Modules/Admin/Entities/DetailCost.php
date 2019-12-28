<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use DateTime;

class DetailCost extends Model
{
    use SoftDeletes;
    protected $table = "detail_cost";
    protected $fillable = [
        'cost_id',
        'name',
        'amount',
        'date',
        'note',
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

    public function setDateAttribute($value)
    {  
        $this->attributes['date'] = DateTime::createFromFormat('d M Y', $value)->format('Y-m-d');
    }

    public function costa()
    {
        return $this->belongsTo('Modules\Admin\Entities\Cost','cost_id','id');
    }
}
