<?php

namespace App\Models;

use App\Services\Image\ImageService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SleepingOwl\Admin\Traits\OrderableModel;
use App\Traits\CreateRelativeImage;

class ImgGallery extends Model
{
    use OrderableModel, CreateRelativeImage;

    protected $imageService;

    protected $table = 'img_galleries';

    protected $fillable = [
        'gallery_id',
        'stack_category_id',
        'description',
        'link_to',
        'title',
        'title_img',
        'title_img_mini',
        'image',
        'image_large',
        'image_medium',
        'image_small',
        'image_thumb',
        'image_mini',
        'image_height',
        'image_height_large',
        'image_height_medium',
        'image_height_small',
        'image_height_thumb',
        'image_height_mini',
        'alt',
        'public',
        'position_img',
        'position_img_vertical',
        'position',
        'page_id',
        'link_id'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->imageService = new ImageService();
    }

    public function gallery()
    {
        return $this->belongsTo('App\Models\Gallery');
    }

    public function links()
    {
        return $this->belongsToMany(Link::class, 'link_counts');
    }

    public function buttons($id = null)
    {
        return DB::table('link_counts')->where('img_gallery_id', '=', $id)
            ->join('links', 'link_counts.link_id', '=', 'links.id')
            ->select('links.*', 'links.title', 'links.url', 'links.page_id')
            ->orderBy('links.position', 'ASC')
            ->get();
    }

    public function getOrderField()
    {
        return 'position';
    }

    /**
     * @return array
     */

    public function getUploadImagesSettings()
    {
        return [
            'image' => [
                'directory' => 'img-galleries/image',
                'quality' => 70,
                'settings' => [
                    'orientate' => [],
                    'resize' => [2560, null, function ($constraint) {
                        $constraint->upsize();
                        $constraint->aspectRatio();
                    }],
                ],
                'relative' => [
                    'image_large' => [
                        'directory' => 'img-galleries/image/large',
                        'quality' => 70,
                        'settings' => [
                            'orientate' => [],
                            'resize' => [1920, null, function ($constraint) {
                                $constraint->upsize();
                                $constraint->aspectRatio();
                            }],
                        ]
                    ],
                    'image_medium' => [
                        'directory' => 'img-galleries/image/medium',
                        'quality' => 70,
                        'settings' => [
                            'orientate' => [],
                            'resize' => [1600, null, function ($constraint) {
                                $constraint->upsize();
                                $constraint->aspectRatio();
                            }],
                        ]
                    ],
                    'image_small' => [
                        'directory' => 'img-galleries/image/small',
                        'quality' => 70,
                        'settings' => [
                            'orientate' => [],
                            'resize' => [1136, null, function ($constraint) {
                                $constraint->upsize();
                                $constraint->aspectRatio();
                            }],
                        ]
                    ],
                    'image_thumb' => [
                        'directory' => 'img-galleries/image/thumb',
                        'quality' => 70,
                        'settings' => [
                            'orientate' => [],
                            'resize' => [640, null, function ($constraint) {
                                $constraint->upsize();
                                $constraint->aspectRatio();
                            }],
                        ]
                    ],
                    'image_mini' => [
                        'directory' => 'img-galleries/image/mini',
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
            ],
            'image_height' => [
                'directory' => 'img-galleries/image-height',
                'quality' => 70,
                'settings' => [
                    'orientate' => [],
                    'resize' => [null, 1600, function ($constraint) {
                        $constraint->upsize();
                        $constraint->aspectRatio();
                    }],
                ],
                'relative' => [
                    'image_height_large' => [
                        'directory' => 'img-galleries/image-height/large',
                        'quality' => 70,
                        'settings' => [
                            'orientate' => [],
                            'resize' => [null, 1080, function ($constraint) {
                                $constraint->upsize();
                                $constraint->aspectRatio();
                            }],
                        ]
                    ],
                    'image_height_medium' => [
                        'directory' => 'img-galleries/image-height/medium',
                        'quality' => 70,
                        'settings' => [
                            'orientate' => [],
                            'resize' => [null, 900, function ($constraint) {
                                $constraint->upsize();
                                $constraint->aspectRatio();
                            }],
                        ]
                    ],
                    'image_height_small' => [
                        'directory' => 'img-galleries/image-height/small',
                        'quality' => 70,
                        'settings' => [
                            'orientate' => [],
                            'resize' => [null, 640, function ($constraint) {
                                $constraint->upsize();
                                $constraint->aspectRatio();
                            }],
                        ]
                    ],
                    'image_height_thumb' => [
                        'directory' => 'img-galleries/image-height/thumb',
                        'quality' => 70,
                        'settings' => [
                            'orientate' => [],
                            'resize' => [null, 360, function ($constraint) {
                                $constraint->upsize();
                                $constraint->aspectRatio();
                            }],
                        ]
                    ],
                    'image_height_mini' => [
                        'directory' => 'img-galleries/image-height/mini',
                        'quality' => 70,
                        'settings' => [
                            'orientate' => [],
                            'resize' => [null, 50, function ($constraint) {
                                $constraint->upsize();
                                $constraint->aspectRatio();
                            }]
                        ]
                    ]
                ]
            ],
            'title_img' => [
                'directory' => 'img-galleries/image-title',
                'quality' => 80,
                'settings' => [
                    'orientate' => [],
                    'resize' => [360, null, function ($constraint) {
                        $constraint->upsize();
                        $constraint->aspectRatio();
                    }],
                ],
                'relative' => [
                    'title_img_mini' => [
                        'directory' => 'img-galleries/image-title/mini',
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

    public function scopePublic($query)
    {
        return $query->where('public', 1);
    }

    public function scopePosition($query)
    {
        return $query->orderBy('position', 'asc');
    }
}
