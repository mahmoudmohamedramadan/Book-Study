<?php

namespace App\Providers;

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
        //NAMESPACE OF VIEW IS: Illuminate\Support\Facades\View NOT View\View
        //View::share('users', User::get());

        // View::composer('home', function ($view) {
        //     $view->with('users', User::get());
        // });

        // View::composer('home', UserComposer::class);

        // Blade::component('book-component', 'modal');

        /*Blade::directive('ifGuest', function() {
            return "<?php if(auth()->guest()) { ?>";
        });*/

        /*instead of directive i can use if function to customize check
        Blade::if('ifGuest', function() {
            return auth()->guest();
        });

        Blade::directive('endIfGuest', function() {
            return '<?php } ?>';
        });*/

        // Contact::creating(function() {
        //     dump('contact is creating now...');
        // });

        // Contact::created(function() {
        //     dump('contact is created successfully');
        // });

        //AND IN GENERAL VIEW YOU CAN DO IT >> Modelname::eventName()
        // Contact::saved(function() {});
        // Contact::saving(function() {});
        // Contact::updated(function() {});
        // Contact::updating(function() {});
        // Contact::deleted(function() {});
        // Contact::deleting(function() {});

        //restoring AND restored METHOD ARE FAMILIER WITH SoftDeletes AND WHEN YOU TRY RESTORE DELETED ROW THESE METHODS WILL TRIGGERE
        // User::restoring(function() {
        //     dump('user is restoring now after SoftDeletes');
        // });
        // User::restored(function() {
        //     dump('user is restored successfully');
        // });

        // Contact::retrieved(function() {});
    }
}
