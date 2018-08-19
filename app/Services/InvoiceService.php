<?php

namespace App\Services;

use App\Invoice;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\FileProfilerStorage;
use Illuminate\Support\Facades\Storage;

class InvoiceService
{
    protected $invoice;

    public function setInvoice(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * Add item to current invoice
     *
     * @param array $attributes
     * @return void
     */
    public function addItem($attributes = [])
    {
        if (!$this->invoice) {
            return;
        }

        //$this->invoice->invoiceItems()->save(InvoiceItem::create($attributes));
        $this->invoice->invoiceItems()->create($attributes);
    }

    public function savePDF()
    {
        $pdf = $this->getPDF();

        $pdfFileName = "pdf/invoice-" . $this->invoice->id . "-" . str_slug($this->invoice->client->name) . "-" . $this->invoice->client->invoices->count() . ".pdf";
        Storage::put($pdfFileName, $pdf->output());
        $this->invoice->update(['pdf' => $pdfFileName]);
    }

    /**
     * Generate PDF and store it in storage
     * update pdf column in model as well
     *
     * @return void
     */
    public function getPDF()
    {
        $client = $this->invoice->client;
        $user = $this->invoice->user;
        $items = $this->invoice->invoiceItems()->latest()->get();
        $invoiceNumber = $this->invoice->client->invoices->count();

        $pdf = app('dompdf.wrapper');
        $pdf->loadView("pdf.invoice", ['invoice' => $this->invoice, 'user' => $user, 'items' => $items, 'client' => $client, 'invoice_number' => $invoiceNumber]);

        return $pdf;
    }

    /**
     * Return total amount of invoice
     *
     * @return void
     */
    public function getTotal()
    {
        $sum = 0;

        foreach ($this->invoice->invoiceItems as $item) {

            $sum += (int) ($item->cost * $item->quantity);

        }

        return $sum;
    }

    /**
     * Get tax out fo total
     *
     * @param float $tax
     * @return integer
     */
    public function getTax()
    {
        $tax_percent = $this->invoice->tax_rate / 100.0;
        return $this->getTotal() * $tax_percent;
    }

    /**
     * Return total including tax
     *
     * @param integer $tax
     * @return integer
     */
    public function getTotalWithTax()
    {
        return $this->getTotal() + $this->getTax();
    }
}
