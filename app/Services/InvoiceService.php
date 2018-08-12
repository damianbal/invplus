<?php 

namespace App\Services;

use App\Invoice;
use App\InvoiceItem;


class InvoiceService 
{
    protected $invoice;

    public function setInvoice(Invoice $invoice) {
        $this->invoice = $invoice;
    }

    /**
     * Add item to current invoice
     *
     * @param array $attributes
     * @return void
     */
    public function addItem($attributes = []) {
        if(!$this->invoice) return; 

        //$this->invoice->invoiceItems()->save(InvoiceItem::create($attributes));
        $this->invoice->invoiceItems()->create($attributes);
    }

    /**
     * Generate PDF and store it in storage
     * update pdf column in model as well
     *
     * @return void
     */
    public function getPDF() {
    
    }

    public function getTotal() {
        $sum = 0;

        foreach($this->invoice->invoiceItems as $item) {

            $sum += (int)($item->cost * $item->quantity);

        }

        return $sum;
    }

    public function getTax($tax = 20) {
        return $this->getTotal() * $tax;
    }

    public function getTotalWithTax($tax = 20) {
        return $this->getTotal() + $this->getTax($tax);
    }
}