<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class IssueReceiptServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('issuereceipt', function(){
            return new \App\IssueReceipt\IssueReceipt();
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
