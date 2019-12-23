<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Cost extends Model
{
    use SoftDeletes;
    protected $table = "cost";
    protected $fillable = [
        'name',
        'type',
        'note',
        'status',
    ];
}
