<?php namespace Lasallecms\Installedpackages;

/**
 *
 * Installed Packages package for the LaSalle Content Management System, based on the Laravel 5 Framework
 * Copyright (C) 2015 - 2016  The South LaSalle Trading Corporation
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 *
 * @package    Installed Packages package for the LaSalle Content Management System
 * @link       http://LaSalleCMS.com
 * @copyright  (c) 2015 - 2016, The South LaSalle Trading Corporation
 * @license    http://www.gnu.org/licenses/gpl-3.0.html
 * @author     The South LaSalle Trading Corporation
 * @email      info@southlasalle.com
 *
 */

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;


/**
 * This is the Installed Packages service provider class.
 *
 * @author Bob Bloom <info@southlasalle.com>
 */
class InstalledpackagesServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;


    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupConfiguration();

        $this->setupMigrations();
        $this->setupSeeds();

        $this->setupRoutes($this->app->router);

        $this->setupTranslations();

        $this->setupViews();

        //$this->setupAssets();
    }


    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupConfiguration();

        $this->setupMigrations();
        $this->setupSeeds();

        $this->setupRoutes($this->app->router);

        $this->setupTranslations();

        $this->setupViews();

        $this->setupAssets();
    }

    /**
     * Setup the Configuration.
     *
     * @return void
     */
    protected function setupConfiguration()
    {
        $configuration = realpath(__DIR__.'/../config/lasallecmsinstalledpackages.php');

        $this->publishes([
            $configuration => config_path('lasallecmsinstalledpackages.php'),
        ]);
    }

    /**
     * Setup the Migrations.
     *
     * @return void
     */
    protected function setupMigrations()
    {
        $migrations = realpath(__DIR__.'/../database/migrations');

        $this->publishes([
            $migrations    => $this->app->databasePath() . '/migrations',
        ]);
    }


    /**
     * Setup the Seeds.
     *
     * @return void
     */
    protected function setupSeeds()
    {
        $seeds = realpath(__DIR__.'/../database/seeds');

        $this->publishes([
            $seeds    => $this->app->databasePath() . '/seeds',
        ]);
    }



    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerinstalledpackages();
    }


    /**
     * Register the application bindings.
     *
     * @return void
     */
    private function registerinstalledpackages()
    {
        $this->app->bind('installedpackages', function($app) {
            return new installedpackages($app);
        });
    }


    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function setupRoutes(Router $router)
    {
        $router->group(['namespace' => 'Lasallecms\Installedpackages\Http\Controllers'], function($router)
        {
            require __DIR__.'/Http/routes.php';
        });

    }


    /**
     * Define the translations for the application.
     *
     * @return void
     */
    public function setupTranslations()
    {
        $this->loadTranslationsFrom(__DIR__.'/../languages', 'installedpackages');
    }


    /**
     * Define the views for the application.
     *
     * @return void
     */
    public function setupViews()
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'installedpackages');

        $this->publishes([
            __DIR__.'/../views' => base_path('resources/views/vendor/lasallecmsinstalledpackages'),
        ]);

    }


    /**
     * Define the assets for the application.
     *
     * @return void
     */
    public function setupAssets()
    {
        $this->publishes([
            __DIR__.'/../public' => public_path('packages/lasallecmsinstalledpackages/'),
        ]);

    }


}