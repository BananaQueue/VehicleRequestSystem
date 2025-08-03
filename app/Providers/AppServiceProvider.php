<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (App::environment('local')) {
            // Clear all session files (only for file-based sessions)
            File::cleanDirectory(storage_path('framework/sessions'));
        }

        // Force logout current session
        Session::flush();
    }
}
