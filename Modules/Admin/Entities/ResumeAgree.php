<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ResumeAgree extends Model
{
    protected $table = "resume_agree";
    protected $fillable = [
        'resume_id',
        'user_id',
        'date',
        'agree',
    ];


    public function getDateAttribute()
    {
        return Carbon::parse($this->attributes['date'])
        ->translatedFormat('l, d-m-Y H:i:s');
    }

    /**
     * Relationship.
     */
    public function user()
    {
        return $this->belongsTo('Modules\Admin\Entities\User','user_id','id');
    }

    public function resume()
    {
        return $this->belongsTo('Modules\Admin\Entities\Resume','resume_id','id');
    }
    
}
