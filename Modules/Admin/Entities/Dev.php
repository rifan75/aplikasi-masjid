<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Dev extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;
    protected $table = "development";
    protected $fillable = [
        'name',
        'type',
        'slug',
        'description',
    ];

    public function registerMediaCollections()
    {
        $this->addMediaCollection('document');
        $this->addMediaCollection('design');
    }

    public function document()
    {
        return $this->media()->where('collection_name', 'document');
    }

    public function design()
    {
        return $this->media()->where('collection_name', 'design');
    }
}
