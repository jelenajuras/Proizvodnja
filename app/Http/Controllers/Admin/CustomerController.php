<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Sentinel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\File;

class CustomerController extends Controller
{
    /**
   * Set middleware to quard controller.
   *
   * @return void
   */
   public function __construct()
    {
        $this->middleware('sentinel.auth');
    }
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$customers = Customer::orderBy('naziv','ASC')->paginate(20);
		return view('admin.customers.index',['customers'=>$customers]);	
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $input = $request;
		//dd($request);
		$data = array(
			'naziv'  => $input['naziv'],
			'adresa'  => $input['adresa'],
			'grad'  => $input['grad'],
			'oib'  => $input['oib']
		);
		
		$customer = new Customer();
		$customer->saveCustomer($data);
		
		if($request->file('logo')){
			$logo = $request->file('logo');
			Storage::putFileAs('logo', new File($logo), $input['naziv'] . '.' .$logo->getClientOriginalExtension());
		}
		
		$message = session()->flash('success', 'Uspješno je dodan novi naručitelj');
		
		//return redirect()->back()->withFlashMessage($messange);
		return redirect()->route('admin.customers.index')->withFlashMessage($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show() //show($id)
    {
        $customer = Customer::find($id);
		
		return view('admin.customers.show',['customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
		return view('admin.customers.edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, $id)
    {
        $customer = Customer::find($id);
		$input = $request;
		
		$data = array(
			'naziv'  => $input['naziv'],
			'adresa'  => $input['adresa'],
			'grad'  => $input['grad'],
			'oib'  => $input['oib']
		);
		
		$customer->updateCustomer($data);
		
		if($request->file('logo')){
			$logo = $request->file('logo');
			Storage::putFileAs('logo', new File($logo), $input['naziv'] . '.' .$logo->getClientOriginalExtension());
		}
		$message = session()->flash('success', 'Uspješno su ispravljeni podaci naručitelja');
		
		//return redirect()->back()->withFlashMessage($messange);
		return redirect()->route('admin.customers.index')->withFlashMessage($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
		$customer ->delete();
		
		$message = session()->flash('success', 'Naručitelj je uspješno obrisan');
		
		return redirect()->route('admin.customers.index')->withFlashMessage($message);
    }
}
