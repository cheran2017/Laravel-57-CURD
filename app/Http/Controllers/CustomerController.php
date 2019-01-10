<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers      = Customer::orderby('updated_at','desc')->paginate(5);
        $data['customers']   = $customers;
        return view('home')->with('data',$data);
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
    public function store(CustomerRequest $request)
    {
        $customer           = new Customer;
        $customer->name     = $request->name;
        $customer->email    = $request->email;
        $customer->address1 = $request->address1;
        $customer->address2 = $request->address2;
        if ($customer->save()) {
            $request->session()->flash('alert-success', 'Customer created successfully!');
        } else {
            $request->session()->flash('alert-danger', 'Customer create failed!');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $data['customer'] = $customer;
        return view('edit-customer')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $customer           = Customer::find($customer->id);
        $customer->name     = $request->name;
        $customer->email    = $request->email;
        $customer->address1 = $request->address1;
        $customer->address2 = $request->address2;
        if ($customer->save()) {
            $request->session()->flash('alert-success', 'Customer updated successfully!');
        } else {
            $request->session()->flash('alert-danger', 'Customer update failed!');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Customer $customer)
    {
        $customer           = Customer::find($customer->id);
        if ($customer->delete()) {
            $request->session()->flash('alert-success', 'Customer deleted successfully!');
        } else {
            $request->session()->flash('alert-danger', 'Customer delete failed!');
        }
        return redirect()->back();
    }
}
