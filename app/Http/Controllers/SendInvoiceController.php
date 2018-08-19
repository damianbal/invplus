<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Invoice;
use App\Mail\InvoiceIssued;
use Illuminate\Support\Facades\Mail;

class SendInvoiceController extends Controller
{
    public function __construct()
    {       
        $this->middleware('auth');
    }

    public function send(Request $request, Invoice $invoice) 
    {
        if(!auth()->user()->can('manage', $invoice)) {
            return back();
        }

        $data = $request->validate([
            'email' => 'min:3|required|email'
        ]);

        Mail::to($data['email'])->send(new InvoiceIssued($invoice));

        return back()->with('message', __('invoice.sent'));
    }
}
