<?php

namespace Leobeal\Laravel\Quiz;

use Illuminate\Support\ServiceProvider;

class QuizServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__.'/../migrations');

            $this->publishes([
                __DIR__.'/../migrations/' => $this->app->databasePath('migrations'),
            ], 'laravelquiz.migrations');
            
            $this->publishes([
                __DIR__.'/../config/quiz.php' => config_path('quiz.php'),
            ], 'laravelquiz.config');
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/quiz.php', 'quiz');

        // Register the service the package provides.
        $this->app->singleton('quiz', function ($app) {
            return new Quiz;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['quiz'];
    }
}
