<?php

namespace Wharfs\UISPApiClient;

//use Spatie\LaravelPackageTools\Package;
//use Spatie\LaravelPackageTools\PackageServiceProvider;
//use Wharfs\UISPApiClient\Commands\UISPApiClientCommand;
use Illuminate\Support\ServiceProvider;
use Wharfs\UISPApiClient\UISPApiClient as Client;

class UISPApiClientServiceProvider extends ServiceProvider
{
 /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton(Client::class, function ($app) {
            return new Client(
                config: [
                    "host" => config('uisp.config.url'),
                    "port" => config('uisp.config.port'),
                    "user" => config('uisp.config.user'),
                    "password" => config('uisp.config.password'),
                    "verifyssl" => config('uisp.config.verifyssl'),
                    "debug" => config('uisp.config.debug', false),
                ]
            );
        });
    }


    // public function configurePackage(Package $package): void
    // {
    //     /*
    //      * This class is a Package Service Provider
    //      *
    //      * More info: https://github.com/spatie/laravel-package-tools
    //      */
    //     $package
    //         ->name('laravel-uisp-api')
    //         ->hasConfigFile()
    //         ->hasViews()
    //         ->hasMigration('create_laravel-uisp-api_table')
    //         ->hasCommand(UISPApiClientCommand::class);
    // }


}
