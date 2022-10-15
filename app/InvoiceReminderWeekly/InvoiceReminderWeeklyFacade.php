<?php

namespace App\InvoiceReminderWeekly;

use Illuminate\Support\Facades\Facade;

class InvoiceReminderWeeklyFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'invoicereminderweekly';
    }
}
