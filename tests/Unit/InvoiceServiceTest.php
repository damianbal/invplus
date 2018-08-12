<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Services\InvoiceService;
use App\Invoice;

class InvoiceServiceTest extends TestCase
{
    

    protected $invoice; 
    protected $invoiceService;

    public function setUp() {
        parent::setUp();

        $this->invoiceService = new InvoiceService;

        //create invoice
        $this->invoice = Invoice::create([
            'user_id' => 0,
            'client_id' => 0
        ]);
    }

    public function testAddItem() {

        $this->invoiceService->setInvoice($this->invoice);

        $this->invoiceService->addItem([
            'name' => 'Pack of 50 chips',
            'description' => 'Pack of 50 chips',
            'cost' => 55,
            'quantity' => 2
        ]);

        $this->assertEquals(1, $this->invoice->invoiceItems->count());
    }

    public function testTotal() {

        $this->invoiceService->setInvoice($this->invoice);

        $this->assertEquals(1, $this->invoice->invoiceItems->count());


    }

}
