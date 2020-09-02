<?php

namespace Tir\Contact;

use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        if (! config('app.installed')) {
            return;
        }

        $this->loadRoutesFrom(__DIR__ . '/Routes/admin.php');
        $this->loadRoutesFrom(__DIR__ . '/Routes/public.php');

        $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');

//        $this->loadViewsFrom(__DIR__ . '/Resources/Views', 'portfolio');

        $this->loadTranslationsFrom(__DIR__ . '/Resources/Lang/', 'contact');

        //Add menu to admin panel
        $this->adminMenu();

    }



    private function adminMenu()
    {
        $menu = resolve('AdminMenu');
        $menu->item('contact')->title('contact::panel.contact')->link('#')->add();
        $menu->item('contact.contact')->title('contact::panel.contact')->route('contact.index')->add();
    }
}
