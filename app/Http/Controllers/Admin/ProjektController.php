<?php

namespace App\Http\Controllers\Admin;

use App\Models\Projekt;
use Illuminate\Http\Request;
use App\Http\Requests\ProjektRequest;
use App\Http\Controllers\Controller;
use Sentinel;


class ProjektController extends Controller
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
        if(Sentinel::inRole('administrator')) {
			$projekti = Projekt::orderBy('id','ASC')->paginate(20);
		} else {
			$user_id= Sentinel::getUser()->id;
			$projekti = Projekt::where('user_id', $user_id)->orderBy('created_at','ASC')->paginate(20);
		}
		return view('admin.projekti.index',['projekti'=>$projekti]);
    }
	
	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projekti.create');
    }
	
	/**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProjektRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjektRequest $request)
    {
       // $user_id = Sentinel::getUser()->id;
		$input = $request;

		$data = array(
			'narucitelj_id'  => $input['investitor_id'],
			'investitor_id'  => $input['investitor_id'],
			'name' 			 => $input['name']
		);
		
		$projekt = new Projekt();
		$projekt->saveProjekt($data);
		
		$message = session()->flash('success', 'Uspješno je dodan novi projekt');
		
		//return redirect()->back()->withFlashMessage($messange);
		return redirect()->route('admin.projekti.index')->withFlashMessage($message);
    }
	
	/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Projekt::find($id);
		
		return view('admin.projekti.show', ['projekt' => $projekt]);
    }
}
