<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Model\ModelConfiguration;

class Send extends Model
{
    protected $table = 'sends';
    protected $fillable = [
        'firstName',
        'lastName',
        'phone',
        'email',
        'yourPosition',
        'hearAboutUs',
        'messages',
        'file_id'
    ];

    public function files()
    {
        return $this->hasMany('App\Models\File');
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($model) {
            if ($model->files) {
                foreach ($model->files as $item) {
                    @unlink($item->filePath);
                }
            }
        });
    }
}
