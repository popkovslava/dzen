<?php

namespace App\Models;

use App\Services\Image\ImageService;
use SleepingOwl\Admin\Traits\OrderableModel;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CreateRelativeImage;

class Video extends Model
{
    use OrderableModel, CreateRelativeImage;

    protected $table = 'videos';

    protected $imageService;

    protected $fillable = ['video_category_id', 'title', 'url', 'public', 'position', 'image', 'image_mini'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->imageService = new ImageService();
    }

    public function getUploadImagesSettings()
    {
        return [
            'image' => [
                'directory' => 'videos/image',
                'quality' => 70,
                'settings' => [
                    'orientate' => [],
                    'resize' => [200, null, function ($constraint) {
                        $constraint->upsize();
                        $constraint->aspectRatio();
                    }]
                ],
                'relative' => [
                    'image_mini' => [
                        'directory' => 'videos/image/mini',
                        'quality' => 70,
                        'settings' => [
                            'orientate' => [],
                            'resize' => [50, null, function ($constraint) {
                                $constraint->upsize();
                                $constraint->aspectRatio();
                            }]
                        ]
                    ]
                ]
            ]
        ];
    }

    public function videoCategory()
    {
        return $this->belongsTo('App\Models\VideoCategory');
    }

    public function getOrderField()
    {
        return 'position';
    }
}
