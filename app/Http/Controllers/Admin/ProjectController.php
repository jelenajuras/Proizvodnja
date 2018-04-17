<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use App\Http\Controllers\Controller;
use Sentinel;


class ProjectController extends Controller
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
		$projects = Project::orderBy('id','ASC')->paginate(20);

		return view('admin.projects.index',['projects'=>$projects]);
    }
	
	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$users = Users::join('role_users','users.id','=','role_users.user_id')->select('users.*','role_users.role_id')->where('role_users.role_id','<>','4')->orderBy('last_name','ASC')->get();
        return view('admin.projects.create')->with('users',$users);
    }
	
	/**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProjektRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
       // $user_id = Sentinel::getUser()->id;
		$input = $request;
		$investitor =  $input['investitor_id'];
		$naručitelj = $input['customer_id'];
		
		if(!$input['investitor_id']) {
			$investitor = $input['customer_id'];
		} 
		if(!$input['customer_id']) {
			$naručitelj = $input['investitor_id'];
		} 

		$data = array(
			'id'             => $input['id'],
			'customer_id'    => $naručitelj,
			'investitor_id'  => $investitor,
			'naziv' 		 => $input['naziv'],
			'objekt' 		 => $input['objekt'],
			'user_id'  		=> $input['user_id']
		);
		
		$project = new Project();
		$project->saveProject($data);
		
		$message = session()->flash('success', 'Uspješno je dodan novi projekt');
		
		//return redirect()->back()->withFlashMessage($messange);
		return redirect()->route('admin.projects.index')->withFlashMessage($message);
    }
	
	/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
		
		return view('admin.projects.show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
		$users = Users::join('role_users','users.id','=','role_users.user_id')->select('users.*','role_users.role_id')->where('role_users.role_id','<>','4')->orderBy('last_name','ASC')->get();
		return view('admin.projects.edit', ['project' => $project])->with('users',$users);
	
    }
	 public function update(ProjectRequest $request, $id)
    {
        $project = Project::find($id);
		$input = $request;
		
		$data = array(
			'customer_id'    => $input['customer_id'],
			'investitor_id'  => $input['investitor_id'],
			'naziv'			 => $input['naziv'],
			'objekt' 		 => $input['objekt'],
			'user_id'  		=> $input['user_id']
		);
		
		$project->updateProject($data);
		
		$message = session()->flash('success', 'Uspješno su ispravljeni podaci  projekta');
		
		//return redirect()->back()->withFlashMessage($messange);
		return redirect()->route('admin.projects.index')->withFlashMessage($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
		$project ->delete();
		
		$message = session()->flash('success', 'Projekt je uspješno obrisan');
		
		return redirect()->route('admin.projects.index')->withFlashMessage($message);
    }
}