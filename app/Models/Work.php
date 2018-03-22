<?php

namespace App\Models;

use App\Services\Image\ImageService;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Traits\OrderableModel;
use EloquentFilter\Filterable;
use App\Traits\CreateRelativeImage;

class Work extends Model
{
    use OrderableModel, Filterable, CreateRelativeImage;

    protected $table = 'works';

    protected $imageService;

    protected $fillable = [
        'title1',
        'image',
        'image_medium',
        'image_large',
        'image_small',
        'image_thumb',
        'title_img',
        'title1',
        'text1',
        'title2',
        'text2',
        'title3',
        'text3',
        'stack_category_id',
        'public',
        'title_single',
        'position',
        'gallery_id_1',
        'title_frontend',
        'text_frontend',
        'title_backend',
        'text_backend',
        'title_mobile',
        'text_mobile',
        'title_tools',
        'text_tools'

    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->imageService = new ImageService();
    }

    public function modelFilter()
    {
        return $this->provideFilter(\App\ModelFilters\WorkFilter::class);
    }

    public function page()
    {
        return $this->hasOne('App\Models\Page')->where('pages.public', '=', true);
    }

    public function gallery_1()
    {
        return $this->belongsTo('App\Models\Gallery', 'gallery_id_1');
    }

    public function gallery_2()
    {
        return $this->belongsTo('App\Models\Gallery', 'gallery_id_2');
    }

    public function gallery_3()
    {
        return $this->belongsTo('App\Models\Gallery', 'gallery_id_3');
    }

    public function stackCategory()
    {
        return $this->belongsTo('App\Models\StackCategory');
    }

    public function getOrderField()
    {
        return 'position';
    }

    public function getUploadImagesSettings()
    {
        return [
            'image' => [
                'directory' => 'works/image',
                'quality' => 70,
                'settings' => [
                    'orientate' => [],
                    'resize' => [1200, null, function ($constraint) {
                        $constraint->upsize();
                        $constraint->aspectRatio();
                    }]
                ],
                'relative' => [
                    'image_large' => [
                        'directory' => 'works/image/large',
                        'quality' => 70,
                        'settings' => [
                            'orientate' => [],
                            'resize' => [800, null, function ($constraint) {
                                $constraint->upsize();
                                $constraint->aspectRatio();
                            }]
                        ]
                    ],
                    'image_medium' => [
                        'directory' => 'works/image/medium',
                        'quality' => 70,
                        'settings' => [
                            'orientate' => [],
                            'resize' => [600, null, function ($constraint) {
                                $constraint->upsize();
                                $constraint->aspectRatio();
                            }]
                        ]
                    ],
                    'image_small' => [
                        'directory' => 'works/image/small',
                        'quality' => 70,
                        'settings' => [
                            'orientate' => [],
                            'resize' => [400, null, function ($constraint) {
                                $constraint->upsize();
                                $constraint->aspectRatio();
                            }]
                        ]
                    ],
                    'image_thumb' => [
                        'directory' => 'works/image/thumb',
                        'quality' => 70,
                        'settings' => [
                            'orientate' => [],
                            'resize' => [200, null, function ($constraint) {
                                $constraint->upsize();
                                $constraint->aspectRatio();
                            }]
                        ]
                    ],
                    'image_mini' => [
                        'directory' => 'works/image/mini',
                        'quality' => 70,
                        'settings' => [
                            'orientate' => [],
                            'resize' => [50, null, function ($constraint) {
                                $constraint->upsize();
                                $constraint->aspectRatio();
                            }]
                        ]
                    ],
                ]
            ],
            'title_img' => [
                'directory' => 'works/title_img',
                'quality' => 70,
                'settings' => [
                    'orientate' => [],
                    'resize' => [360, null, function ($constraint) {
                        $constraint->upsize();
                        $constraint->aspectRatio();
                    }]
                ],
            ]
        ];
    }

    public function scopePublic($query)
    {
        return $query->where('public', 1);
    }

    public function scopePosition($query)
    {
        return $query->orderBy('position', 'asc');
    }
}

