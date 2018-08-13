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

        $this->invoiceService->addItem([
            'name' => 'Pack of 50 chips',
            'description' => 'Pack of 50 chips',
            'cost' => 55,
            'quantity' => 2
        ]);


        $this->assertEquals(1, $this->invoice->invoiceItems->count());
        $this->assertEquals(110, $this->invoiceService->getTotal());


    }

    public function testTotalTax() {
        $this->invoiceService->setInvoice($this->invoice);

        $this->invoiceService->addItem([
            'name' => 'Pack of 50 chips',
            'description' => 'Pack of 50 chips',
            'cost' => 100,
            'quantity' => 1
        ]);

        $this->assertEquals(20, $this->invoiceService->getTax(0.20));
    }

    public function testTotalWithTax() {
        $this->invoiceService->setInvoice($this->invoice);

        $this->invoiceService->addItem([
            'name' => 'Pack of 50 chips',
            'description' => 'Pack of 50 chips',
            'cost' => 100,
            'quantity' => 1
        ]);

        $this->assertEquals(120, $this->invoiceService->getTotalWithTax(0.20));
    }

}
