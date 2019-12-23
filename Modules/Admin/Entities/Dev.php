<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Dev extends Model
{
    use SoftDeletes;
    protected $table = "development";
    protected $fillable = [
        'name',
        'team',
        'planning',
        'note',
    ];

    protected $casts=[
        'team'=>'array',
        'planning'=>'array',
    ];
}
