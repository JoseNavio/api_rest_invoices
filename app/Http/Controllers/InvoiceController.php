<?php

namespace App\Http\Controllers;

use App\Filters\InvoiceFilter;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Http\Resources\InvoiceCollection;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new InvoiceFilter();

        //Use the transform method of the InvoiceFilter object to apply filters
        $queryItems = $filter->transform($request);

        //Check if any filters were applied
        if (count($queryItems) == 0) {
            //If no filters were applied, fetch all Invoice objects
            return new InvoiceCollection(Invoice::paginate());
        } else {
            /* If filters were applied, fetch the filtered Invoice objects, paginate them,
             *  append the original request query parameters to the paginator, wrap the
             *  paginated results in an InvoiceCollection, and return them
             */
            $invoices = Invoice::where($queryItems)->paginate();
            return new InvoiceCollection($invoices->appends($request->query()));
        }
    }

//    public function index()
//    {
//        $invoices = Invoice::paginate();
//        return new InvoiceCollection($invoices);
//    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
