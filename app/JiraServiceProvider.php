<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 20.04.17
 * Time: 1:08
 */

namespace App;


use Illuminate\Support\ServiceProvider;
class JiraServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes( [
            __DIR__ . '/config/jira.php' => config_path( 'jira.php' ),
        ] );
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom( __DIR__ . '/config/jira.php', 'jira' );
        $this->app['jira'] = $this->app->share( function ( $app )
        {
            return new Jira;
        } );
    }
}