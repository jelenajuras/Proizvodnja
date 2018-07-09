<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Cabinet;
use App\Models\Preparation;
use App\Models\Purchase;
use App\Models\Production;
use App\Http\Controllers\Controller;
use Sentinel;
use DateTime;

class PreparationController extends Controller
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
        $cabinets = Cabinet::get();

		$preparations = Preparation::get();
		$productions = Production::get();
		$purchases = Purchase::get();
		
		return view('admin.preparations.index',['preparations'=>$preparations])->with('cabinets', $cabinets)->with('productions', $productions)->with('purchases', $purchases);
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

		return view('admin.preparations.create')->with('idOrmara', $idOrmara)->with('cabinet', $cabinet);
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
		
		//dd($brProj);
		
		$data = array(
			'datum'  => date("Y-m-d", strtotime($input['datum'])),
			'ormar_id'  => $input['ormar_id'],
			'koment_3p'  => $input['koment_3p'],
			'koment_3pOd'  => $input['koment_3pOd'],
			'koment_komax'  => $input['koment_komax'],
			'koment_perf'  => $input['koment_perf'],
			'koment_od'  => $input['koment_od'],
			'koment_exp'  => $input['koment_exp'],
			'koment_pr'  => $input['koment_pr'],
			'rijeseno1'  => $input['rijeseno1'],
			'rijeseno2'  => $input['rijeseno2'],
			'rijeseno3'  => $input['rijeseno3'],
			'rijeseno4'  => $input['rijeseno4'],
			'rijeseno5'  => $input['rijeseno5'],
			'rijeseno6'  => $input['rijeseno6'],
			'rijeseno7'  => $input['rijeseno7']
		);
		
		$preparation = new Preparation();
		$preparation->savePreparation($data);
		$project = Cabinet::where('id',$input['ormar_id'])->first();
		$brProj = $project->projekt_id;
		
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
        $preparation = Preparation::join('cabinets','preparations.ormar_id','cabinets.id')->select('preparations.*','cabinets.brOrmara')->find($id);
		$cabinet = Cabinet::where('id','=',$preparation->ormar_id)->first();
		//dd($preparation);
		return view('admin.preparations.show', ['preparation' => $preparation])->with('cabinet', $cabinet);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$preparation = Preparation::find($id);
		$cabinet = Cabinet::where('id','=',$preparation->ormar_id)->first();

		$purchase= Purchase::where('ormar_id','=',$preparation->ormar_id)->first();
		
		//$purchase = Purchase::find($id);
		//$cabinet = Cabinet::where('id','=',$purchase->ormar_id)->first();
		
		$production = Production::where('ormar_id','=',$preparation->ormar_id)->first();
		//dd($production);
		
		return view('admin.preparations.edit', ['preparation' => $preparation], ['purchase' => $purchase], ['production' => $production])->with('cabinet', $cabinet)->with('purchase', $purchase)->with('production', $production);
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
        $preparation = Preparation::find($id);
		$input = $request;
		$project = Cabinet::where('id',$input['ormar_id'])->first();
		$brProj = $project->projekt_id;
		//dd($brProj);

		$data = array(
			'ormar_id'  => $input['ormar_id'],
			'datum'  => date("Y-m-d", strtotime($input['datum'])),
			'koment_3p'  => $input['koment_3p'],
			'koment_3pOd'  => $input['koment_3pOd'],
			'koment_komax'  => $input['koment_komax'],
			'koment_perf'  => $input['koment_perf'],
			'koment_od'  => $input['koment_od'],
			'koment_exp'  => $input['koment_exp'],
			'koment_pr'  => $input['koment_pr'],
			'rijeseno1'  => $input['rijeseno1'],
			'rijeseno2'  => $input['rijeseno2'],
			'rijeseno3'  => $input['rijeseno3'],
			'rijeseno4'  => $input['rijeseno4'],
			'rijeseno5'  => $input['rijeseno5'],
			'rijeseno6'  => $input['rijeseno6'],
			'rijeseno7'  => $input['rijeseno7']
		);
		
		$preparation->updatePreparation($data);
		
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