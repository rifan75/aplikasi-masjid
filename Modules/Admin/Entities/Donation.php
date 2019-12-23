<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Donation extends Model
{
    use SoftDeletes;
    protected $table = "donations";
    protected $fillable = [
        'name',
        'contact',
        'form',
        'type',
        'note',
    ];

    protected $casts=[
        'contact'=>'array',
    ];
}
