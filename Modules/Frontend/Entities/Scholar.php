<?php

namespace Modules\Frontend\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Scholar extends Model
{
    use SoftDeletes;
    protected $table = "scholars";
    protected $attributes = [
        'name',
        'note',
        'contact',
    ];
}
