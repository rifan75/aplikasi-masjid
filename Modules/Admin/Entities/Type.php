<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Type extends Model
{
    use SoftDeletes;
    protected $table = "finance_type";
    protected $fillable = [
        'name',
        'note',
    ];
}
