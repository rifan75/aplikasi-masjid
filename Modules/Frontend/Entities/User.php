<?php

namespace Modules\Frontend\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use HasMediaTrait, HasRoles;

    protected $guard_name = 'web';
    protected $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token'
    ];
    /**
     * Media Library.
     */
    public function registerMediaCollections()
    {
        $this->addMediaCollection('picture')
                ->singleFile();
    }
    /**
     * Accessor & Mutator.
     */
    public function setPasswordAttribute($pass)
    {
        $this->attributes['password'] = Hash::make($pass);
    }
    /**
     * Relation.
     */

    public function profile()
    {
        return $this->hasOne('Modules\Frontend\Entities\Profile','user_id','id');
    }

    public function verifyUser()
    {
        return $this->hasOne('Modules\Frontend\Entities\VerifyUser','user_id','id');
    }
    
    public function verifyUserIntern()
    {
        return $this->hasOne('Modules\Frontend\Entities\VerifyUserIntern','user_id','id');
    }
}
