<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }


    /**
     * Check apakah user punya satu role tertentu
     * @param  string  $role [description]
     * @return boolean        [description]
     */
    public function hasAnyRole(string $role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    /**
     * Check apakah user memiliki salah satu dari role
     * @param  array $roles [description]
     * @return boolean        [description]
     */
    public function hasAnyRoles(array $roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }


    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('profile')
            ->useFallbackUrl('/dist/images/default-user.jpg')
            ->useFallbackPath(public_path('/dist/images/default-user.jpg'))
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->fit(Manipulations::FIT_CROP, 100, 100)
                    ->nonQueued();
                    $this
                    ->addMediaConversion('thumb_small')
                    ->fit(Manipulations::FIT_CROP, 60, 60)
                    ->nonQueued();
                    
                // $this
                //     ->addMediaConversion('thumb')
                //     ->width(100)
                //     ->height(100);
            });
    }
}
