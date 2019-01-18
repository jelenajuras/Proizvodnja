<?php

namespace App\Http\Controllers\Admin;

use App\Models\Production;
use App\Models\Users;
use App\Models\Cabinet;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;
use App\Models\Preparation;
use App\Models\Purchase;

class ProductionController extends Controller
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
		return view('admin.productions.index');
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
		$purchase = Purchase::where('ormar_id','=',$idOrmara)->first();
		
		return view('admin.productions.create')->with('idOrmara', $idOrmara)->with('cabinet', $cabinet)->with('purchase', $purchase);
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
		$ormar = Cabinet::where('id',$input['ormar_id'])->first();
		$brProj = $ormar->projekt_id;
		$tvornickiBr = Production::orderBy('tvornickiBr','desc')->first();
		$tvornickiBr = $tvornickiBr->tvornickiBr+1;
		
		$data = array(
			'ormar_id'  => $input['ormar_id'],
			'datum'  => date("Y-m-d", strtotime($input['datum'])),
			'koment_mp'  => $input['koment_mp'],
			'koment_orm'  => $input['koment_orm'],
			'koment_vod'  => $input['koment_vod'],
			'koment_ozn'  => $input['koment_ozn'],
			'koment_slMp'  => $input['koment_slMp'],
			'koment_oznMp'  => $input['koment_oznMp'],
			'koment_ozic'  => $input['koment_ozic'],
			'koment_dok'  => $input['koment_dok'],
			'koment_isp'  => $input['koment_isp'],
			'rijeseno1'  => $input['rijeseno1'],
			'rijeseno2'  => $input['rijeseno2'],
			'rijeseno3'  => $input['rijeseno3'],
			'rijeseno4'  => $input['rijeseno4'],
			'rijeseno5'  => $input['rijeseno5'],
			'rijeseno6'  => $input['rijeseno6'],
			'rijeseno7'  => $input['rijeseno7'],
			'rijeseno8'  => $input['rijeseno8'],
			'rijeseno9'  => $input['rijeseno9'],
		);
		
		if($input['rijeseno9'] == 'DA'){
			$data['tvornickiBr'] = $tvornickiBr;
			}
		
		$production = new Production();
		$production->saveProduction($data);
		
		$message = session()->flash('success', 'Zapis je uspješno spremljen.');
		
		return redirect()->back()->withFlashMessage($message);
		//return redirect()->route('admin.productions.show', ['brProj' => $brProj])->withFlashMessage($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Production  $production
     * @return \Illuminate\Http\Response
     */
	 
    public function show(Request $request, $id)
    {
		
		$production = Production::join('cabinets','productions.ormar_id','cabinets.id')->select('productions.*','cabinets.brOrmara')->find($id);
		$cabinet = Cabinet::where('id','=',$production->ormar_id)->first();
		//dd($preparation);
		return view('admin.productions.show', ['production' => $production])->with('cabinet', $cabinet);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $production = Production::find($id);
		$cabinet = Cabinet::where('id','=',$production->ormar_id)->first();
		
		//dd($cabinet);
		
		return view('admin.productions.edit', ['production' => $production])->with('cabinet', $cabinet);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->except(['_token']);
		$production = Production::find($id);
		
		$ormar = Cabinet::where('id',$input['ormar_id'])->first();
		$brProj = $ormar->projekt_id;
		
		$tvornickiBr = Production::orderBy('tvornickiBr','desc')->first();
		$tvornickiBr = $tvornickiBr->tvornickiBr+1;

		$data = array(
			'ormar_id'  => $input['ormar_id'],
			'datum'  => date("Y-m-d", strtotime($input['datum'])),
			'koment_mp'  => $input['koment_mp'],
			'koment_orm'  => $input['koment_orm'],
			'koment_vod'  => $input['koment_vod'],
			'koment_ozn'  => $input['koment_ozn'],
			'koment_slMp'  => $input['koment_slMp'],
			'koment_oznMp'  => $input['koment_oznMp'],
			'koment_ozic'  => $input['koment_ozic'],
			'koment_dok'  => $input['koment_dok'],
			'koment_isp'  => $input['koment_isp'],
			'rijeseno1'  => $input['rijeseno1'],
			'rijeseno2'  => $input['rijeseno2'],
			'rijeseno3'  => $input['rijeseno3'],
			'rijeseno4'  => $input['rijeseno4'],
			'rijeseno5'  => $input['rijeseno5'],
			'rijeseno6'  => $input['rijeseno6'],
			'rijeseno7'  => $input['rijeseno7'],
			'rijeseno8'  => $input['rijeseno8'],
			'rijeseno9'  => $input['rijeseno9']
		);
		
		if($input['rijeseno9'] == 'DA' && !$production->tvornickiBr) {
			$data['tvornickiBr'] = $tvornickiBr;
		}
		

		$production->updateProduction($data);
		
		$message = session()->flash('success', 'Uspješno su ispravljeni podaci');
		
		return redirect()->back()->withFlashMessage($message);
		//return redirect()->route('admin.productions.show', ['brProj' => $brProj])->withFlashMessage($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function destroy(Production $production)
    {
        //
    }
}
