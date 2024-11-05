<?php

namespace App\Providers;

use App\Http\Constants\UserConstants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        View::share('UserConstants', UserConstants::class);

        Blade::if('hasRole', static function ($roles) {
            if (is_string($roles)) {
                $roles = explode(',', $roles);
            }

            return Auth::check() && in_array(Auth::user()->role, $roles, true);
        });

        Blade::directive('endHasRole', static function () {
            return '<?php endif; ?>';
        });
    }
}
