<?php

namespace App\Providers;

use App\Http\Composer\UserComposer;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //View::share('users', User::get());

        // View::composer('home', function ($view) {
        //     $view->with('users', User::get());
        // });

        View::composer('home', UserComposer::class);

        // Blade::component('book-component', 'modal');

        /*Blade::directive('ifGuest', function() {
            return "<?php if(auth()->guest()) { ?>";
        });*/

        //instead of directive i can use if function to customize check
        Blade::if('ifGuest', function() {
            return auth()->guest();
        });

        Blade::directive('endIfGuest', function() {
            return '<?php } ?>';
        });
    }
}
