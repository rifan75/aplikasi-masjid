<?php

namespace Modules\Frontend\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DetailDonation extends Model
{
    use SoftDeletes;
    protected $table = "detail_donations";
    protected $fillable = [
        'donations_id',
        'name',
        'amount',
        'date',
        'note',
    ];
}
