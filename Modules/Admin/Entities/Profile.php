<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $table = "profile";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'user_id',
        'contact',
    ];

    protected $casts=[
        'contact'=>'array'
    ];
    
    /**
     * Relationship.
     */
    public function user()
    {
        return $this->belongsTo('Modules\Admin\Entities\User','user_id','id');
    }
}
