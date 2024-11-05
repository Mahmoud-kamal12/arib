<?php

namespace App\Providers;

use App\Http\Constants\UserConstants;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;


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
