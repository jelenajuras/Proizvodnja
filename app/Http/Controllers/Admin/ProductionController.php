<?php

namespace App\Http\Controllers\Admin;

use App\Models\Production;
use App\Models\Users;
use App\Models\Cabinet;
use App\Models\ProductionProject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
		$production = ProductionProject::join('customers','production_projects.investitor_id','=','customers.id')->select('production_projects.*','customers.naziv as investitor')->find($id);
		$roles = app()->make('sentinel.roles')->createModel()->where('slug','kupac')->first();
		$contacts = Users::where('productionProject_id','=',$id)->get();
		$cabinets= Cabinet::where('projekt_id','=',$production->id)->get();
		
		dd($cabinets);
		
		return view('admin.productions.show', ['production' => $production], ['roles' => $roles])->with('contacts',$contacts)->with('cabinets',$cabinets);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function edit(Production $production)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Production $production)
    {
        //
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
