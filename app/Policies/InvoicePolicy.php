<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Invoice;

class InvoicePolicy
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

    public function download(User $user, Invoice $invoice) 
    {
        return $user->id == $invoice->user_id;
    }
    
    public function show(User $user, Invoice $invoice)
    {
        return $user->id == $invoice->user_id;
    }

    public function destroy(User $user, Invoice $invoice)
    {
        return $user->id == $invoice->user_id;
    }
}
