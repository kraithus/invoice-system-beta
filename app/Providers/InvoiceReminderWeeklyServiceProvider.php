<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class InvoiceReminderWeeklyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('invoicereminderweekly', function(){
            return new \App\InvoiceReminderWeekly\InvoiceReminderWeekly();
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
