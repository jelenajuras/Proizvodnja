<?php

namespace App\Http\Controllers\Admin;

use Sentinel;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;


class DashboardController extends Controller
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
		$projects = Project::join('customers','investitor_id','customers.id')->select('projects.*','customers.naziv as investitor')->get();
		
		return view('admin.dashboard')->with('projects',$projects);
    }
}
