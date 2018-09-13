<?php

namespace App\Models;

use App\Services\Image\ImageService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use SleepingOwl\Admin\Traits\OrderableModel;
use App\Traits\CreateRelativeImage;

class ClientsSection extends Model
{
    use OrderableModel, CreateRelativeImage;

    protected $table = 'clients_sections';

    protected $fillable = [
        'clients_section_category_id',
        'public',
        'name',
        'description',
        'text',
        'alt',
        'image',
        'image_thumb',
        'image_mini',
        'link_in',
        'link_fb'
    ];

    protected $imageService;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->imageService = new ImageService();
    }

    public function link()
    {
        return $this->belongsToMany(Link::class, 'link_client_counts');
    }

    public function clientsSectionCategory()
    {
        return $this->belongsTo('App\Models\ClientsSectionCategory');
    }

    public function buttons($id = null)
    {
        return DB::table('link_client_counts')->where('clients_section_id', '=', $id)
            ->join('links', 'link_client_counts.link_id', '=', 'links.id')
            ->select('links.*', 'links.title', 'links.url', 'links.page_id')
            ->get();
    }

    public function getOrderField()
    {
        return 'position';
    }

    public function getUploadImagesSettings()
    {
        return [
            'image' => [
                'directory' => 'clients-sections/image',
                'quality' => 70,
                'settings' => [
                    'orientate' => [],
                    'resize' => [250, null, function ($constraint) {
                        $constraint->upsize();
                        $constraint->aspectRatio();
                    }]
                ],
                'relative' => [
                    'image_thumb' => [
                        'directory' => 'clients-sections/image/thumb',
                        'quality' => 70,
                        'settings' => [
                            'orientate' => [],
                            'resize' => [150, null, function ($constraint) {
                                $constraint->upsize();
                                $constraint->aspectRatio();
                            }]
                        ]
                    ],
                    'image_mini' => [
                        'directory' => 'clients-sections/image/mini',
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

    /**
     * select btn
     *
     * @param string $title
     * @return void
     */
    public function getBtnIcon($title)
    {
        if ($title == "Video testimonial") {
            echo "<svg class='icon icon-video big'>
                    <use xlink:href='#icon-video'></use>
                </svg>";
        }

        if ($title == "Case study") {
            echo "<svg class='icon-case-svg big'>
                    <use xlink:href='#icon-case-svg'></use>
                </svg>";
        }

        if ($title != "Case study" || $title != "Video testimonial") {
            echo "<svg class='icon icon-letter-svg big'>
                    <use xlink:href='#icon-letter-svg'></use>
                </svg>";
        }
    }
}
