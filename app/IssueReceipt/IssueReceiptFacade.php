<?php

namespace App\IssueReceipt;

use Illuminate\Support\Facades\Facade;

class IssueReceiptFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'issuereceipt';
    }
}
