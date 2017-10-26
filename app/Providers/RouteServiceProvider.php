<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapPanitiumRoutes();

        $this->mapRegupesertumRoutes();

        $this->mapJuriRoutes();

        //
    }

    /**
     * Define the "juri" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapJuriRoutes()
    {
        Route::group([
            'middleware' => ['web', 'juri', 'auth:juri'],
            'prefix' => 'juri',
            'as' => 'juri.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/juri.php');
        });
    }

    /**
     * Define the "regupesertum" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapRegupesertumRoutes()
    {
        Route::group([
            'middleware' => ['web', 'regupesertum', 'auth:regupesertum'],
            'prefix' => 'regupesertum',
            'as' => 'regupesertum.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/regupesertum.php');
        });
    }

    /**
     * Define the "panitium" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapPanitiumRoutes()
    {
        Route::group([
            'middleware' => ['web', 'panitium', 'auth:panitium'],
            'prefix' => 'panitium',
            'as' => 'panitium.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/panitium.php');
        });
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
