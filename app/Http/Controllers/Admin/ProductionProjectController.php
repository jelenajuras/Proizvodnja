<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProductionProject;
use App\Models\Project;
use App\Models\Users;
use Centaur\AuthManager;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Users\IlluminateUserRepository;
use App\Http\Requests\ProductionProjectRequest;
use App\Http\Controllers\Controller;
use Sentinel;
use DB;

class ProductionProjectController extends Controller
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
        $production_projects = ProductionProject::join('customers','production_projects.investitor_id','=','customers.id')->select('production_projects.*','customers.naziv as investitor')->orderBy('id','ASC')->get();
		
		$projects = Project::join('customers','projects.investitor_id','=','customers.id')->select('projects.*','customers.naziv as investitor')->orderBy('projects.id','ASC')->get();
	   //dd($projects);
		
		return view('admin.production_projects.index',['production_projects'=>$production_projects])->with('projects',$projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::join('customers','projects.investitor_id','=','customers.id')->select('projects.*','customers.naziv as investitor')->orderBy('projects.id','ASC')->get();
		$users = Users::join('role_users','users.id','=','role_users.user_id')->select('users.*','role_users.role_id')->where('role_users.role_id','<>','4')->orderBy('last_name','ASC')->get();
		
		$brojPr = ProductionProject::orderBy('id','DESC')->first();
		$brojPr = $brojPr['id'];
		$brojPr ++;

		//dd($roles);
		
		return view('admin.production_projects.create')->with('projects',$projects)->with('users',$users)->with('brojPr',$brojPr);
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
		
		$investitor = Project::where('id',$input['projekt_id'])->value('investitor_id');
		//dd($investitor);
		
		$data = array(
			'id'  => $input['id'],
			'projekt_id'  	=> $input['projekt_id'],
			'investitor_id' => $investitor,
			'naziv'    		=> $input['naziv'],
			'user_id'  		=> $input['user_id']
		);
		
		$production_project = new ProductionProject();
		$production_project->saveProductionProject($data);
		
		$message = session()->flash('success', 'Novi projekt je spremljen.');
		
		//return redirect()->back()->withFlashMessage($messange);
		return redirect()->route('admin.production_projects.show', [$input['id'] => $production_project])->withFlashMessage($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $production_project = ProductionProject::join('customers','production_projects.investitor_id','=','customers.id')->select('production_projects.*','customers.naziv as investitor')->first();
		$roles = app()->make('sentinel.roles')->createModel()->where('slug','kupac')->first();
		$kontakti = Users::where('productionProject_id','=',$id)->get();

		
		return view('admin.production_projects.show', ['production_project' => $production_project], ['roles' => $roles])->with('kontakti',$kontakti);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $production_project = ProductionProject::find($id);
		$production_projects = ProductionProject::get();
		$projects = Project::join('customers','projects.investitor_id','=','customers.id')->select('projects.*','customers.naziv as investitor')->orderBy('projects.id','ASC')->get();
		$users = Users::join('role_users','users.id','=','role_users.user_id')->select('users.*','role_users.role_id')->where('role_users.role_id','<>','4')->orderBy('last_name','ASC')->get();
		
		return view('admin.production_projects.edit', ['production_project' => $production_project])->with('projects',$projects)->with('users',$users)->with('production_projects',$production_projects);
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
        $production_project = ProductionProject::find($id);
		$input = $request->except(['_token']);
		
		$investitor = Project::where('id',$input['projekt_id'])->value('investitor_id');
		//dd($investitor);
		
		$data = array(
			'id'  => $input['id'],
			'projekt_id'  	=> $input['projekt_id'],
			'investitor_id' => $investitor,
			'naziv'    		=> $input['naziv'],
			'user_id'  		=> $input['user_id']
		);
		
		$production_project->updateProductionProject($data);
		
		$message = session()->flash('success', 'Promjene su spremljene.');
		
		return redirect()->route('admin.production_projects.index')->withFlashMessage($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $production_project = ProductionProject::find($id);
		$production_project->delete();
		
		$message = session()->flash('success', 'Projekt je obrisan.');
		
		return redirect()->route('admin.posts.index')->withFlashMessage($message);
    }
}