<?php

namespace App\IssueInvoice;

use Illuminate\Support\Facades\Facade;

class IssueInvoiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'issueinvoice';
    }
}
