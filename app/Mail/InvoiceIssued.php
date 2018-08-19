<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Invoice;

class InvoiceIssued extends Mailable
{
    use Queueable, SerializesModels;

    protected $invoice;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;

        $this->subject("Invoice #" . $invoice->client->invoices->count() . " - " . $invoice->user->company_name ?? $invoice->user->name);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.invoice', ['invoice' => $this->invoice])->attachFromStorage($this->invoice->pdf);
    }
}
