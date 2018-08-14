<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreInvoiceRequest;
use App\Invoice;
use App\Client;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = auth()->user()->invoices()->latest()->paginate(10);

        return view('invoices.index', ['invoices' => $invoices]);
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
    public function store(StoreInvoiceRequest $request)
    {
        $name = $request->name; 
        $client = Client::find($request->client_id);

        $invoice = auth()->user()->invoices()->create([
            'client_id' => $client->id,
            'name' => $name
        ]);

        return back()->with('message', __('invocie.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {   
        $client = $invoice->client;
        $user = $invoice->user; 
        $items = $invoice->invoiceItems()->latest()->get();

        return view('invoices.show', [
            'invoice' => $invoice,
            'client' => $client,
            'user' => $user,
            'items' => $items
        ]);
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
    public function destroy(Invoice $invoice)
    {
        if(!auth()->user()->can('destroy', $invoice)) {
            return back();
        }

        $invoice->delete();

        return back();
    }

    public function showPDF(Invoice $invoice)
    {
        if(!auth()->user()->can('download', $invoice)) {
            return back()->with('message', __('common.no_permission'));
        }

        $client = $invoice->client;
      $user = $invoice->user;
      $items = $invoice->items;

        $pdf = app('dompdf.wrapper');
        $pdf->loadView("pdf.invoice", ['invoice' => $invoice, 'user' => $user, 'items' => $items, 'client' => $client]);
       
        return $pdf->download("inv.pdf");
    }
}
