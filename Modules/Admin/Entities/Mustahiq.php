<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Mustahiq extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;
    protected $table = "list_mustahiq";
    protected $fillable = [
        'name',
        'type',
        'note',
        'status',
        'contact',
        'witness',
        'given',
    ];

    protected $casts=[
        'contact'=>'array',
        'witness'=>'array',
        'given'=>'array'
    ];

    /**
     * Media Library.
     */
    public function registerMediaCollections()
    {
        $this->addMediaCollection('mustahiq')
                ->singleFile();
    }
}
