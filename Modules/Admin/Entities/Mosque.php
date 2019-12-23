<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Mosque extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;
    protected $table = "mosque";
    protected $fillable = [
        'name',
        'contact',
        'organizer',
        'history',
    ];

    protected $casts=[
        'contact'=>'array',
        'organizer'=>'array'
    ];
    
    /**
     * Media Library.
     */
    public function registerMediaCollections()
    {
        $this->addMediaCollection('mosque')
                ->singleFile();
    }
}
