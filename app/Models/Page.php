<?php

namespace App\Models;

use App\Admin\Http\Sections\Pages;
use Illuminate\Database\Eloquent\Model;
use Mockery\Exception;
use Illuminate\Support\Facades\DB;

class Page extends Model
{
    protected $table = 'pages';

    protected $fillable = [
        'gallery_id',
        'clients_section_id',
        'work_id',
        'product_id',
        'title',
        'slug',
        'public',
        'description',
        'keywords',
        'text',
        'main_page',
        'videos_block_id',
        'clients_section_category_id'
    ];

    protected $with = [
        'gallery.slides'
    ];

    public function menu()
    {
        return $this->hasOne('App\Models\MainMenu');
    }

    public function gallery()
    {
        return $this->belongsTo('App\Models\Gallery');
    }

    public function clientsSection()
    {
        return $this->belongsTo('App\Models\ClientsSection');
    }

    public function clientSectionCategory()
    {
        return $this->belongsTo('App\Models\ClientsSectionCategory', 'clients_section_category_id');
    }

    public function videoCategory()
    {
        return $this->belongsTo('App\Models\VideoCategory');
    }

    public function bannerBottom()
    {
        return $this->belongsTo('App\Models\BannerBottom');
    }

    public function work()
    {
        return $this->belongsTo('App\Models\Work')->where(['public'=>true]);
    }

    public function products()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }

    public function scopePublic($query)
    {
        return $query->where('public', 1);
    }

    public function getOrderField()
    {
        return 'position';
    }

    public function pageById($id = null)
    {
        return DB::table('pages')->where('id', '=', $id)->first();
    }

    public function stackByIdCategory($id = null)
    {
        $return = DB::table('count_stacks')->where('count_stacks.stack_category_id', '=', $id)
            ->join('stacks', 'stacks.id', '=', 'count_stacks.stack_id')
            ->select('stacks.*')
            ->where('stacks.public', '=', true)
            ->orderBy('stacks.position', 'ASC')
            ->get();

        if (!empty($return)) {
            $array = array();
            foreach ($return as $key => $item) {
                $array[] = $item->title;
            }
        }
        return implode(" |  ", $array);
    }

    public function getPage($id)
    {
        return $this->with(['gallery.slides' => function ($q) {
            $q->public()->position()->with('page')->take(6);
        }])->slug($id);
    }

    public function getSlugById($id = null)
    {
        return DB::table('pages')->where('id', $id)->first();
    }

    public static function getList()
    {
        return static::lists('title', 'id')->toArray();
    }

    public static function boot()
    {
        parent::boot();
        static::updating(function ($model) {
            if ($model->main_page) {
                return Page::where(['main_page' => 1])->update(['main_page' => 0]);
            }
        });
        static::creating(function ($model) {
            if ($model->main_page) {
                return Page::where(['main_page' => 1])->update(['main_page' => 0]);
            }
        });
    }
}
