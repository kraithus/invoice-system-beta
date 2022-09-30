<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class IssueInvoiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('issueinvoice', function(){
            return new IssueInvoice();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
