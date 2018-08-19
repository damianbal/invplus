<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\InvoiceItem;
use App\Services\InvoiceService;
use Illuminate\Http\Request;

class InvoiceItemController extends Controller
{
    protected $invoiceService;

    public function __construct(InvoiceService $invoiceService)
    {
        $this->invoiceService = $invoiceService;

        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Invoice $invoice)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'min:3',
            'quantity' => 'numeric',
            'cost' => 'numeric',
        ]);

        if (!auth()->user()->can('manage', $invoice)) {
            return back();
        }

        $this->invoiceService->setInvoice($invoice);
        $invoiceItem = $this->invoiceService->addItem($request->all());

        return back()->with('message', __('invoice.item_added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoiceItem $invoiceItem)
    {
        if (!auth()->user()->can('manage', $invoiceItem)) {
            return back();
        }

        $invoiceItem->delete();

        return back();
    }

    public function increase(InvoiceItem $invoiceItem)
    {
        if (!auth()->user()->can('manage', $invoiceItem)) {
            return back();
        }

        $invoiceItem->increment('quantity');

        return back();
    }

    public function decrease(InvoiceItem $invoiceItem)
    {
        if (!auth()->user()->can('manage', $invoiceItem)) {
            return back();
        }

        if ($invoiceItem->quantity > 0) {
            $invoiceItem->decrement('quantity');
        }

        return back();
    }
}
