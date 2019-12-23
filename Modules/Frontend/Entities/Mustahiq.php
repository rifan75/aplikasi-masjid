<?php

namespace Modules\Frontend\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Mustahiq extends Model
{
    use SoftDeletes;
    protected $table = "list_mustahiq";
    protected $casts=[
        'contact'=>'array'
    ];
    protected $fillable = [
        'name',
        'type',
        'note',
        'status',
        'contact',
        'witness',
        'given',
    ];
}
