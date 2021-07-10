<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WEB\Customer;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $customer = Customer::latest('customer')->paginate(5);
        return view('customer.index',compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $request->validate([
            
            

              'customer_name'=>'required',
               'location'=>'required',
              'number_of_orders'=>'required',
               'total_spending'=>'required',

        ]);
        $customer=Customer::create($request->all());
        return redirect()->route('customers.index')->with('succes','customer add successiflly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customer.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer )
    {
        return view('customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'customer_name'=>'required',
            'location'=>'required',
           'number_of_orders'=>'required',
            'total_spending'=>'required',

     ]);
     $customer=Customer::update($request->all());
     return redirect()->route('customers.index')->with('succes','customer add successiflly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('succes','customer delete successiflly');
    }
}
