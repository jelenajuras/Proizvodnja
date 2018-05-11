<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Cabinet;
use App\Models\Users;
use App\Models\Project;
use App\Models\Preparation;
use App\Http\Requests\CabinetRequest;
use App\Http\Controllers\Controller;
use Sentinel;
use Mail;

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
		$user = Sentinel::getUser()->id;
		$cabinets = Cabinet::join('projects','cabinets.projekt_id','=','projects.id')->join('customers','projects.investitor_id','=','customers.id')->select('cabinets.*','projects.id as PrBroj','projects.investitor_id as kupac','projects.naziv as PrNaziv','projects.objekt','customers.naziv as investitor')->get();
		$priprema = Preparation::get();
		
		//dd($priprema);

		return view('admin.cabinets.index',['cabinets'=>$cabinets])->with('priprema',$priprema);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$user = Sentinel::getUser()->id;
		$projects = Project::join('customers','projects.investitor_id','customers.id')->select('projects.*','customers.naziv as investitor')->where('user_id','=',$user)->orderBy('id','ASC')->get();
		$zadnjibr = Cabinet::orderBy('brOrmara','DESC')->first();
		$users = Users::join('role_users','users.id','=','role_users.user_id')->select('users.*','role_users.role_id')->where('role_users.role_id','<>','4')->orderBy('last_name','ASC')->get();

		//dd($projects);
		
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
	
		$proizvodjacOpr=array();
		$i=0;
		foreach($input as $key => $value){
			if(strstr($key,'_',true) == 'proizvodjacOpr' ) {
				array_push($proizvodjacOpr, $value);
				$i++;
			}
		}
		$oprema = implode(", ", $proizvodjacOpr);

		$data = array(
			'brOrmara'  => $input['brOrmara'],
			'projektirao_id'  => $input['projektirao_id'],
			'odobrio_id'  => $input['odobrio_id'],
			'projekt_id'  => $input['projekt_id'],
			'datum_isporuke'  => date("Y-m-d", strtotime($input['datum_isporuke'])),
			'proizvodjac'  => $input['proizvodjac'],
			'proizvodjacOpr'  => $oprema,
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
			'ip_zastita'  => 'IP' . $input['ip_zastita'],
			'ulaz_kabela'  => $input['ulaz_kabela'] . ' '. $input['kab_dimenzija'] ,
			/*'bak_razvod'  => $input['bak_razvod']. ' '. $input['bak_dimenzija'],*/
			'oznake'  => $input['oznake'],
			'logo'  => $input['logo'],
			'napomena'  => $input['napomena']
		);
		
		
		$cabinet = new Cabinet();
		$cabinet->saveCabinet($data);
		
		$ormar = Project::where('projects.id','=',$input['projekt_id'])->join('customers','projects.investitor_id','customers.id')->select('projects.*','customers.naziv as investitor')->first();

		//dd($investitor);
		
		//$ = Equipment::distinct()->get(['User_id']);
		//$user_mail = Users::select('id','email')->where('id',$zaduzena_osoba->User_id)->value('email');
		$email_proba = 'jelena.juras@duplico.hr'; 
		$koordinacija = 'koordicija@duplico.hr';
		$priprena = 'priprema@duplico.hr';
		$isporuka = date("Y-m-d", strtotime($input['datum_isporuke']));
		$investitor = $ormar->investitor;
			Mail::queue(
				'email.store_cabinet',
				['ormar' => $ormar,'email_proba' => $email_proba,'brOrmara' => $input['brOrmara'], 'naziv' => $input['naziv'], 'isporuka' => $isporuka, 'investitor' => $investitor],
				function ($message) use ($email_proba) {
					$message->to($email_proba)
							//->cc($koordinacija)
							// ->cc($priprena)
						->subject('Novi ormar proizvodnje');
				}
			);

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
		$proizvodjacOpr = explode(', ',$cabinet->proizvodjacOpr);
		
		$kab_dimenzija="";
		$ulaz_kabela="";
		if(strpos($cabinet->ulaz_kabela,'Otvor') !== false) {
			$kabel = explode(' ',$cabinet->ulaz_kabela);
			$kab_dimenzija = end($kabel);
			$ulaz_kabela = array_chunk($kabel,3);
			$ulaz_kabela = implode(' ',$ulaz_kabela[0]);
		} 

		return view('admin.cabinets.edit', ['cabinet' => $cabinet])->with('projects',$projects)->with('users',$users)->with('proizvodjacOpr',$proizvodjacOpr)->with('kab_dimenzija',$kab_dimenzija)->with('ulaz_kabela',$ulaz_kabela);
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
		
		$proizvodjacOpr=array();
		$Ulkabela =array();
		$i=0;
		foreach($input as $key => $value){
			if(strstr($key,'_',true) == 'proizvodjacOpr' ) {
				array_push($proizvodjacOpr, $value);
				$i++;
			}
		}
		$oprema = implode(", ", $proizvodjacOpr);
		
		$data = array(
			'brOrmara'  => $input['brOrmara'],
			'projektirao_id'  => $input['projektirao_id'],
			'odobrio_id'  => $input['odobrio_id'],
			'projekt_id'  => $input['projekt_id'],
			'datum_isporuke'  => date("Y-m-d", strtotime($input['datum_isporuke'])),
			'proizvodjac'  => $input['proizvodjac'],
			'proizvodjacOpr'  => $oprema,
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
			'ip_zastita'  => 'IP' . $input['ip_zastita'],
			'ulaz_kabela'  => $input['ulaz_kabela'] . ' '. $input['kab_dimenzija'] ,
			/*'bak_razvod'  => $input['bak_razvod']. ' '. $input['bak_dimenzija'],*/
			'oznake'  => $input['oznake'],
			'logo'  => $input['logo'],
			'napomena'  => $input['napomena']
		);
		
		$cabinet->updateCabinet($data);
		
		$ormar = Project::where('projects.id','=',$input['projekt_id'])->join('customers','projects.investitor_id','customers.id')->select('projects.*','customers.naziv as investitor')->first();

		//dd($investitor);
		
		$email_proba = 'jelena.juras@duplico.hr'; 
		$koordinacija = 'koordicija@duplico.hr';
		$priprena = 'priprema@duplico.hr';
		$isporuka = date("Y-m-d", strtotime($input['datum_isporuke']));
		$investitor = $ormar->investitor;
			Mail::queue(
				'email.store_cabinet',
				['ormar' => $ormar,'email_proba' => $email_proba,'brOrmara' => $input['brOrmara'], 'naziv' => $input['naziv'], 'isporuka' => $isporuka, 'investitor' => $investitor],
				function ($message) use ($email_proba) {
					$message->to($email_proba)
							//->cc($koordinacija)
							// ->cc($priprena)
						->subject('Novi ormar proizvodnje');
				}
			);
			
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
