<?php


namespace Hxsen\WebTest;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class WebUrlServiceProvider extends ServiceProvider
{
    protected $namespace = 'Hxsen\WebTest\http\Controllers';

    public function boot()
    {
        $this->registerRoutes();
    }

    public function register()
    {
        $this->app->singleton('web_url', function () {
            return new WebUrl();
        });
        // 合并配置文件
        $this->mergeConfigFrom(
            __DIR__.'/../config/web_url.php', 'web_url'
        );
    }

    /**
     * 发布配置文件
     *
     * @author houxin 2021/11/10 17:46
     */
    public function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../config/web_url.php' => config_path('web_url.php'),
        ]);
    }

    /**
     * 加载路由以及控制器命名空间
     *
     * @author houxin 2021/11/4 19:50
     */
    protected function registerRoutes()
    {
        Route::group([
            'prefix'    => '',
            'namespace' => 'Hxsen\WebTest\http\Controllers',
        ], function () {
            // 增加路由功能
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }
}
