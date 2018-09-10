<?php

namespace App\Providers;
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
    ];

    /**
     * Register sections.
     *
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {

        $this->registerPolicies('App\\Admin\\Policies\\');
       // $this->app->call([$this, 'registerFormElements']);
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

}
