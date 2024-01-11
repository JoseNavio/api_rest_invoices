<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\CustomerCollection;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use App\Filters\CustomerFilter;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    /*
     * Eloquent ORM queries:
     *
     * All: Customer::all();
     * Find: Customer::find(1); //1 is the primary key
     * First: Customer::first();
     * Where: Customer::where('name', 'John')->get();
     * Order by: Customer::orderBy('name', 'desc')->get();
     * Count: Customer::count();
     * Update: Customer::where('name', 'John')->update(['name' => 'Steve']);
     * Delete: Customer::where('name', 'John')->delete();
     */

    /**
     * Display a json listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new CustomerFilter();
        $queryItems = $filter->transform($request);
        //Include in the json the invoices of each customer
        $includeInvoice = $request->query('includeInvoices');
        //Eloquent ORM query
        $customers = Customer::where($queryItems);//It can have 3 parameters: column, operator, value
        //todo Comment this
        if ($includeInvoice) {
            $customers = $customers->with('invoices');
        }
        return new CustomerCollection($customers->paginate()->appends($request->query()));
    }

//    public function index()
//    {
//        //So the json struct appear like: "name" : [{},{}]
//        $customer = Customer::all();
//        //Split json in pages
//        $customer = Customer::paginate();
//        return $customer;
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
    public function store(StoreCustomerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * Create a Resource first...
     */
    public function show(Customer $customer)
    {
        $includeInvoice = request()->query('includeInvoices');
        if ($includeInvoice) {
           return new CustomerResource($customer->loadMissing('invoices'));
        }
        return new CustomerResource($customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
