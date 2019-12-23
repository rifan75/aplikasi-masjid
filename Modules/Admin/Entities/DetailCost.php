<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DetailCost extends Model
{
    use SoftDeletes;
    protected $table = "detail_cost";
    protected $fillable = [
        'cost_id',
        'amount',
        'date',
        'note',
    ];
}
