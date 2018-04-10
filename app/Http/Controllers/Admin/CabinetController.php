<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Cabinet;
use App\Http\Requests\CabinetRequest;
use App\Http\Controllers\Controller;
use Sentinel;
use App\Models\ProductionProject;

class CabinetController extends Controller
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
		$cabinets = Cabinet::join('production_projects','cabinets.projekt_id','=','production_projects.id')->join('projects','production_projects.projekt_id','=','projects.id')->join('customers','production_projects.investitor_id','=','customers.id')->select('cabinets.*','production_projects.id as brProjekta','production_projects.investitor_id as kupac','projects.id as PrBroj','projects.naziv as PrNaziv','projects.objekt','customers.naziv as investitor')->orderBy('id','ASC')->get();

		return view('admin.cabinets.index',['cabinets'=>$cabinets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$projects = ProductionProject::join('projects','production_projects.projekt_id','=','projects.id')->join('customers','projects.investitor_id','customers.id')->select('production_projects.*','projects.naziv as nazivProjekta', 'projects.id as brProjekta','projects.objekt as objekt','projects.investitor_id','customers.naziv as investitor')->orderBy('id','ASC')->get();
		
		//dd($projects);
		return view('admin.cabinets.create')->with('projects',$projects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CabinetRequest $request)
    {
		$input = $request->except(['_token']);

		$data = array(
			'id'  => $input['id'],
			'projekt_id'  => $input['projekt_id'],
			'proizvodjac'  => $input['proizvodjac'],
			'naziv'  => $input['naziv'],
			'velicina'  => $input['velicina'],
			'tip'  => $input['tip'],
			'model'  => $input['model'],
			'materijal'  => $input['materijal'],
			'izvedba'  => $input['izvedba'],
			'napon'  => $input['napon'],
			'struja'  => $input['struja'],
			'prekidna_moc'  => $input['prekidna_moc'],
			'sustav_zastite'  => $input['sustav_zastite'],
			'ip_zastita'  => $input['ip_zastita']
		);
		
		$cabinet = new Cabinet();
		$cabinet->saveCabinet($data);
		
		$message = session()->flash('success', 'Ormar je uspješno spremljen.');
		
		//return redirect()->back()->withFlashMessage($messange);
		return redirect()->route('admin.cabinets.index')->withFlashMessage($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cabinet = Cabinet::find($id);
		
		return view('admin.cabinets.show', ['cabinet' => $cabinet]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cabinet = Cabinet::find($id);
		$projects = ProductionProject::join('projects','production_projects.projekt_id','=','projects.id')->join('customers','projects.investitor_id','customers.id')->select('production_projects.*','projects.naziv as nazivProjekta', 'projects.id as brProjekta','projects.objekt as objekt','projects.investitor_id','customers.naziv as investitor')->orderBy('id','ASC')->get();
		
		return view('admin.cabinets.edit', ['cabinet' => $cabinet])->with('projects',$projects);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CabinetRequest $request, $id)
    {
        $cabinet = Cabinet::find($id);
		$input = $request->except(['_token']);

		$data = array(
			'id'  => $input['id'],
			'projekt_id'  => $input['projekt_id'],
			'proizvodjac'  => $input['proizvodjac'],
			'naziv'  => $input['naziv'],
			'velicina'  => $input['velicina'],
			'tip'  => $input['tip'],
			'model'  => $input['model'],
			'materijal'  => $input['materijal'],
			'izvedba'  => $input['izvedba'],
			'napon'  => $input['napon'],
			'struja'  => $input['struja'],
			'prekidna_moc'  => $input['prekidna_moc'],
			'sustav_zastite'  => $input['sustav_zastite'],
			'ip_zastita'  => $input['ip_zastita']
		);
		
		$cabinet->updateCabinet($data);
		
		$message = session()->flash('success', 'Ispravljeni su podaci ormara' . $cabinet->id );
		
		return redirect()->route('admin.posts.index')->withFlashMessage($message);
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
