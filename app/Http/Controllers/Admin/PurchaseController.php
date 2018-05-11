<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Cabinet;
use App\Models\Purchase;
use App\Http\Controllers\Controller;
use Sentinel;

class PurchaseController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $idOrmara = $request->id;
		$cabinet = Cabinet::where('id','=',$idOrmara)->first();

		return view('admin.purchases.create')->with('idOrmara', $idOrmara)->with('cabinet', $cabinet);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except(['_token']);
		$project = Cabinet::where('id',$input['ormar_id'])->first();
		$brProj = $project->projekt_id;
		//dd($brProj);
		
		$data = array(
			'datum'  => date("Y-m-d", strtotime($input['datum'])),
			'ormar_id'  => $input['ormar_id'],
			'koment_orm'  => $input['koment_orm'],
			'koment_kan'  => $input['koment_kan'],
			'koment_sine'  => $input['koment_sine'],
			'koment_vod'  => $input['koment_vod'],
			'koment_bak'  => $input['koment_bak'],
			'koment_stez'  => $input['koment_stez'],
			'koment_sklOpr'  => $input['koment_sklOpr'],
			'koment_PLC'  => $input['koment_PLC'],
			'rijeseno1'  => $input['rijeseno1'],
			'rijeseno2'  => $input['rijeseno2'],
			'rijeseno3'  => $input['rijeseno3'],
			'rijeseno4'  => $input['rijeseno4'],
			'rijeseno5'  => $input['rijeseno5'],
			'rijeseno6'  => $input['rijeseno6'],
			'rijeseno7'  => $input['rijeseno7'],
			'rijeseno8'  => $input['rijeseno8'],
			'datum1'  => date("Y-m-d", strtotime($input['datum1'])),
			'datum2'  => date("Y-m-d", strtotime($input['datum2'])),
			'datum3'  => date("Y-m-d", strtotime($input['datum3'])),
			'datum4'  => date("Y-m-d", strtotime($input['datum4'])),
			'datum5'  => date("Y-m-d", strtotime($input['datum5'])),
			'datum6'  => date("Y-m-d", strtotime($input['datum6'])),
			'datum7'  => date("Y-m-d", strtotime($input['datum7'])),
			'datum8'  => date("Y-m-d", strtotime($input['datum8'])),
			'naruceno1'  => $input['naruceno1'],
			'naruceno2'  => $input['naruceno2'],
			'naruceno3'  => $input['naruceno3'],
			'naruceno4'  => $input['naruceno4'],
			'naruceno5'  => $input['naruceno5'],
			'naruceno6'  => $input['naruceno6'],
			'naruceno7'  => $input['naruceno7'],
			'naruceno8'  => $input['naruceno8']
		);
		
		$purchase = new Purchase();
		$purchase->savePurchase($data);
		
		$message = session()->flash('success', 'Zapis je uspješno spremljen.');
		
		return redirect()->back()->withFlashMessage($message);
		//return redirect()->route('admin.productions.show', ['brProj' => $brProj])->withFlashMessage($message);
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
        $purchase = Purchase::find($id);
		$cabinet = Cabinet::where('id','=',$purchase->ormar_id)->first();
		
		//dd($cabinet);
		
		return view('admin.purchases.edit', ['purchase' => $purchase])->with('cabinet', $cabinet);
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
        $purchase = Purchase::find($id);
		$input = $request;
		$project = Cabinet::where('id',$input['ormar_id'])->first();
		$brProj = $project->projekt_id;
		//dd($brProj);

		$data = array(
			'datum'  => date("Y-m-d", strtotime($input['datum'])),
			'ormar_id'  => $input['ormar_id'],
			'koment_orm'  => $input['koment_orm'],
			'koment_kan'  => $input['koment_kan'],
			'koment_sine'  => $input['koment_sine'],
			'koment_vod'  => $input['koment_vod'],
			'koment_bak'  => $input['koment_bak'],
			'koment_stez'  => $input['koment_stez'],
			'koment_sklOpr'  => $input['koment_sklOpr'],
			'koment_PLC'  => $input['koment_PLC'],
			'rijeseno1'  => $input['rijeseno1'],
			'rijeseno2'  => $input['rijeseno2'],
			'rijeseno3'  => $input['rijeseno3'],
			'rijeseno4'  => $input['rijeseno4'],
			'rijeseno5'  => $input['rijeseno5'],
			'rijeseno6'  => $input['rijeseno6'],
			'rijeseno7'  => $input['rijeseno7'],
			'rijeseno8'  => $input['rijeseno8'],
			'datum1'  => date("Y-m-d", strtotime($input['datum1'])),
			'datum2'  => date("Y-m-d", strtotime($input['datum2'])),
			'datum3'  => date("Y-m-d", strtotime($input['datum3'])),
			'datum4'  => date("Y-m-d", strtotime($input['datum4'])),
			'datum5'  => date("Y-m-d", strtotime($input['datum5'])),
			'datum6'  => date("Y-m-d", strtotime($input['datum6'])),
			'datum7'  => date("Y-m-d", strtotime($input['datum7'])),
			'datum8'  => date("Y-m-d", strtotime($input['datum8'])),
			'naruceno1'  => $input['naruceno1'],
			'naruceno2'  => $input['naruceno2'],
			'naruceno3'  => $input['naruceno3'],
			'naruceno4'  => $input['naruceno4'],
			'naruceno5'  => $input['naruceno5'],
			'naruceno6'  => $input['naruceno6'],
			'naruceno7'  => $input['naruceno7'],
			'naruceno8'  => $input['naruceno8']
		);
		
		$purchase->updatePurchase($data);
		
		$message = session()->flash('success', 'Uspješno su ispravljeni podaci');
		
		return redirect()->back()->withFlashMessage($message);
		//return redirect()->route('admin.productions.show', ['brProj' => $brProj])->withFlashMessage($message);
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
