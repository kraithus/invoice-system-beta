<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\District;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
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
        $districts = District::all()->sortBy('name');

        $data = [
            'districts' => $districts
        ];
        return view('customer.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'max:191',
            'phone' => 'required', 'string', 'max:22',
            'organisation' => 'required', 'string', 'max:255',
            'address_1' => 'required', 'string', 'max:255',
            'address_2' => 'max:255',
            'district_id' => 'required', 'number',
        ]);

        $customer = new Customer;

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->organisation = $request->organisation;
        $customer->address_1 = $request->address_1;
        $customer->address_2 = $request->address_2;
        $customer->district_id = $request->district_id;

        $customer->save();
        return redirect()->route('dashboard')->with('message', 'Customer added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('customer.profile', [
            'customer' => Customer::findOrFail($id)
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
        $customer = Customer::find($id);

        $request->validate([
            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'max:191'
        ]);

        $customer->name = $request->name;
        $customer->email = $request->email;

        $customer->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
