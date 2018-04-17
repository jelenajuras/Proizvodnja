<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Cabinet;
use App\Models\Users;
use App\Models\Project;
use App\Http\Requests\CabinetRequest;
use App\Http\Controllers\Controller;
use Sentinel;

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
		$cabinets = Cabinet::join('projects','cabinets.projekt_id','=','projects.id')->join('customers','projects.investitor_id','=','customers.id')->select('cabinets.*','projects.id as PrBroj','projects.investitor_id as kupac','projects.naziv as PrNaziv','projects.objekt','customers.naziv as investitor')->orderBy('id','ASC')->get();

		return view('admin.cabinets.index',['cabinets'=>$cabinets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$projects = Project::join('customers','projects.investitor_id','customers.id')->select('projects.*','customers.naziv as investitor')->orderBy('id','ASC')->get();
		$zadnjibr = Cabinet::orderBy('brOrmara','DESC')->first();
		$users = Users::join('role_users','users.id','=','role_users.user_id')->select('users.*','role_users.role_id')->where('role_users.role_id','<>','4')->orderBy('last_name','ASC')->get();
		
		//dd($zadnjibr->brOrmara);
		return view('admin.cabinets.create')->with('projects',$projects)->with('zadnjibr',$zadnjibr)->with('users',$users);
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
	//	dd($input);
		$data = array(
			'brOrmara'  => $input['brOrmara'],
			'projektirao_id'  => $input['projektirao_id'],
			'odobrio_id'  => $input['odobrio_id'],
			'projekt_id'  => $input['projekt_id'],
			'datum_isporuke'  => date("Y-m-d", strtotime($input['datum_isporuke'])),
			'proizvodjac'  => $input['proizvodjac'],
			'proizvodjacOpr'  => $input['proizvodjacOpr'],
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
			'ip_zastita'  => $input['ip_zastita'],
			'ulaz_kabela'  => $input['ulaz_kabela'] . ' '. $input['kab_dimenzija'] ,
			/*'bak_razvod'  => $input['bak_razvod']. ' '. $input['bak_dimenzija'],*/
			'oznake'  => $input['oznake'],
			'logo'  => $input['logo'],
			'napomena'  => $input['napomena']
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
		$projects = Project::join('customers','projects.investitor_id','customers.id')->select('projects.*','customers.naziv as investitor')->orderBy('id','ASC')->get();
		$users = Users::join('role_users','users.id','=','role_users.user_id')->select('users.*','role_users.role_id')->where('role_users.role_id','<>','4')->orderBy('last_name','ASC')->get();
		return view('admin.cabinets.edit', ['cabinet' => $cabinet])->with('projects',$projects)->with('users',$users);
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
		//dd($input);
		$data = array(
			'brOrmara'  => $input['brOrmara'],
			'projektirao_id'  => $input['projektirao_id'],
			'odobrio_id'  => $input['odobrio_id'],
			'projekt_id'  => $input['projekt_id'],
			'datum_isporuke'  => date("Y-m-d", strtotime($input['datum_isporuke'])),
			'proizvodjac'  => $input['proizvodjac'],
			'proizvodjacOpr'  => $input['proizvodjacOpr'],
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
			'ip_zastita'  => $input['ip_zastita'],
			'ulaz_kabela'  => $input['ulaz_kabela'] . ' '. $input['kab_dimenzija'] ,
			/*'bak_razvod'  => $input['bak_razvod']. ' '. $input['bak_dimenzija'],*/
			'oznake'  => $input['oznake'],
			'logo'  => $input['logo'],
			'napomena'  => $input['napomena']
		);
		
		$cabinet->updateCabinet($data);
		
		$message = session()->flash('success', 'Ispravljeni su podaci ormara' . $cabinet->id );
		
		return redirect()->route('admin.cabinets.index')->withFlashMessage($message);
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
