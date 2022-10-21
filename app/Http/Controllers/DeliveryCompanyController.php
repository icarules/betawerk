<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeliveryCompanyRequest;
use App\Models\DeliveryCompany;
use Illuminate\Http\Request;

class DeliveryCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = DeliveryCompany::orderBy('name','desc')->paginate(5);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeliveryCompanyRequest $request)
    {
        $request->safe();

        return redirect()->route('companies.index')->with('success','Company has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeliveryCompany  $deliveryCompany
     * @return \Illuminate\Http\Response
     */
    public function show(DeliveryCompany $deliveryCompany)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeliveryCompany  $deliveryCompany
     * @return \Illuminate\Http\Response
     */
    public function edit(DeliveryCompany $company)
    {
        return view('companies.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DeliveryCompany  $deliveryCompany
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeliveryCompany $company)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        $company->fill($request->post())->save();

        return redirect()->route('companies.index')->with('success','Company Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeliveryCompany  $deliveryCompany
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryCompany $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success','Company has been deleted successfully');
    }
}
