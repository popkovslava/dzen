<?php

namespace App\Providers;

use KodiCMS\Assets\Facades\PackageManager;
use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use SleepingOwl\Admin\Contracts\Navigation\NavigationInterface;
use SleepingOwl\Admin\Contracts\Template\MetaInterface;
use SleepingOwl\Admin\Contracts\Widgets\WidgetsRegistryInterface;

class AdminSectionsServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $widgets = [
        \App\Admin\Widgets\DashboardMap::class,
        \App\Admin\Widgets\NavigationNotifications::class,
        \App\Admin\Widgets\NavigationUserBlock::class,
    ];

    /**
     * @var array
     */
    protected $sections = [
        \App\Models\User::class => 'App\Admin\Http\Sections\Users',
        \App\Models\Role::class => 'App\Admin\Http\Sections\Roles',
        \App\Models\Page::class => 'App\Admin\Http\Sections\Pages',
        \App\Models\MainMenu::class => 'App\Admin\Http\Sections\MainMenus',
        \App\Models\Gallery::class => 'App\Admin\Http\Sections\Galleries',
        \App\Models\ImgGallery::class => 'App\Admin\Http\Sections\ImgGalleries',
        \App\Models\Link::class => 'App\Admin\Http\Sections\link',
        \App\Models\BannerBottom::class => 'App\Admin\Http\Sections\BannerBottom',
        \App\Models\ClientsSectionCategory::class => 'App\Admin\Http\Sections\ClientsSectionCategory',
        \App\Models\ClientsSection::class => 'App\Admin\Http\Sections\ClientsSection',
        \App\Models\Video::class => 'App\Admin\Http\Sections\Video',
        \App\Models\VideoCategory::class => 'App\Admin\Http\Sections\VideoCategory',
        \App\Models\Stack::class => 'App\Admin\Http\Sections\Stack',
        \App\Models\StackCategory::class => 'App\Admin\Http\Sections\StackCategory',
        \App\Models\Work::class => 'App\Admin\Http\Sections\Works',
        \App\Models\Config::class => 'App\Admin\Http\Sections\Config',
        \App\Models\Send::class => 'App\Admin\Http\Sections\Send',
        \App\Models\KeyConfig::class => 'App\Admin\Http\Sections\KeyConfig'
    ];

    /**
     * Register sections.
     *
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
        $this->registerPolicies('App\\Admin\\Policies\\');
        $this->app->call([$this, 'registerFormElements']);
        $this->app->call([$this, 'registerRoutes']);
        $this->app->call([$this, 'registerNavigation']);
        parent::boot($admin);
        $this->app->call([$this, 'registerViews']);
        $this->app->call([$this, 'registerMediaPackages']);
    }

    /**
     * @param Router $router
     */
    public function registerRoutes(Router $router)
    {
        $router->group([
                'prefix' => config('sleeping_owl.url_prefix'),
                'middleware' => config('sleeping_owl.middleware')
            ], function ($router) {
                require base_path('app/Admin/routes.php');
            });
    }

    /**
     * @param NavigationInterface $navigation
     */
    public function registerNavigation(NavigationInterface $navigation)
    {
        require base_path('app/Admin/navigation.php');
    }

    /**
     * @param WidgetsRegistryInterface $widgetsRegistry
     */
    public function registerViews(WidgetsRegistryInterface $widgetsRegistry)
    {
        foreach ($this->widgets as $widget) {
            $widgetsRegistry->registerWidget($widget);
        }
    }

    /**
     * @param MetaInterface $meta
     */
    public function registerMediaPackages(MetaInterface $meta)
    {
        $packages = $meta->assets()->packageManager();
        require base_path('app/Admin/assets.php');
    }

    /**
     * Rigister custom form elements
     *
     * @return void
     */
    public function registerFormElements()
    {
        $formElementContainer = app('sleeping_owl.form.element');
        $formElements = require base_path('app/Admin/formElements.php');

        foreach ($formElements as $name => $class) {
             $formElementContainer->add($name, $class);
        }
    }
}
