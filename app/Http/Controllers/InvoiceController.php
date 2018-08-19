<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Invoice;
use App\Services\InvoiceService;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    protected $invoiceService;

    public function __construct(InvoiceService $invoiceService)
    {
        $this->middleware('auth');

        $this->invoiceService = $invoiceService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // TODO: by client id
        $client_id = $request->input('client', null);

        if ($client_id != null) {
            if (Client::find($client_id)->user_id != auth()->user()->id) {
                return back()->with('message', __('common.no_permission'));
            }

            $invoices = auth()->user()->invoices()->where('client_id', $client_id)->latest()->paginate(10);
        } else {
            $invoices = auth()->user()->invoices()->latest()->paginate(10);
        }

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
            'name' => $name,
        ]);

        return back()->with('message', __('invoice.created'));
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
            'items' => $items,
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
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        if (!auth()->user()->can('manage', $invoice)) {
            return back();
        }

        $invoice->update($request->all());

        $this->invoiceService->setInvoice($invoice);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        if (!auth()->user()->can('destroy', $invoice)) {
            return back();
        }

        $invoice->delete();

        return back();
    }

    public function showPDF(Invoice $invoice)
    {
        if (!auth()->user()->can('download', $invoice)) {
            return back()->with('message', __('common.no_permission'));
        }

        $this->invoiceService->setInvoice($invoice);
        $pdf = $this->invoiceService->getPDF();

        /*
        $pdf->save('pdf/' . "invoice-for-" . str_slug($invoice->client->name) . ".pdf");
        $invoice->update(['pdf' => 'pdf/' . "invoice-for-" . str_slug($invoice->client->name) . ".pdf"]);
         */
        $this->invoiceService->savePDF();

        return $pdf->download("invoice-for-" . str_slug($invoice->client->name) . ".pdf");
    }
}
