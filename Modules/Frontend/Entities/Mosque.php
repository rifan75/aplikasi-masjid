<?php

namespace Modules\Frontend\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Mosque extends Model
{
    use SoftDeletes;
    protected $table = "mosque";
    protected $casts=[
        'organizer'=>'array'
    ];
    protected $fillable = [
        'name',
        'contact',
        'organizer',
        'description',
    ];
}
