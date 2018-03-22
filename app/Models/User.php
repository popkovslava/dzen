<?php

namespace App\Models;

use App\Services\Image\ImageService;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\HasRoles;
use App\Traits\CreateRelativeImage;

class User extends Authenticatable
{
    use Notifiable, HasRoles, CreateRelativeImage;

    protected $imageService;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'time_start',
        'time_stop',
        'phone'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->imageService = new ImageService();
    }

    public function getUploadImagesSettings()
    {
        return [
            'avatar' => [
                'directory' => 'users/avatars',
                'quality' => 80,
                'settings' => [
                    'orientate' => [],
                    'resize' => [200, null, function ($constraint) {
                        $constraint->upsize();
                        $constraint->aspectRatio();
                    }]
                ]
            ]
        ];
    }

    /**
     * @return bool
     */
    public function isSuperAdmin()
    {
        return $this->hasRole('admin');
    }

    /**
     * @return bool
     */
    public function isManager()
    {
        return $this->hasRole('manager');
    }

    /**
     * @param string $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * @return string
     */
    public function getAvatarUrlOrBlankAttribute()
    {
        if (empty($url = $this->avatar)) {
            return asset('img/blank.png');
        }

        return asset($url);
    }
}
