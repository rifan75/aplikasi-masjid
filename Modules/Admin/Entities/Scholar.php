<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Scholar extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;
    protected $table = "scholars";
    protected $fillable = [
        'name',
        'note',
        'contact',
    ];

    protected $casts=[
        'contact'=>'array'
    ];
    /**
     * Media Library.
     */
    public function registerMediaCollections()
    {
        $this->addMediaCollection('scholar')
                ->singleFile();
    }

    public function lecture()
    {
         return $this->hasMany('Modules\Admin\Entities\Lecture','scholar_id','id');
    }
}
