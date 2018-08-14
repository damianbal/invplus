<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\InvoiceItem;

class InvoiceItemPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function manage(User $user, InvoiceItem $invoiceItem)
    {
        return $user->id == $invoiceItem->invoice->user->id;
    }
}
