<?php

namespace App\Http\Controllers\Auth;

use Sentinel;
use Centaur\AuthManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Centaur\Dispatches\BaseDispatch;
use App\Models\Project;

class SessionController extends Controller
{
    /** @var Centaur\AuthManager */
    protected $authManager;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(AuthManager $authManager)
    {
        $this->middleware('sentinel.guest', ['except' => 'getLogout']);
        $this->authManager = $authManager;
    }

    /**
     * Show the Login Form
     * @return View
     */
    public function getLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle a Login Request
     * @return Response|Redirect
     */
    public function postLogin(Request $request)
    {
        // Validate the Form Data
        $result = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Assemble Login Credentials
        $credentials = [
            'email' => trim($request->get('email')),
            'password' => $request->get('password'),
        ];
        $remember = (bool)$request->get('remember', false);

        // Attempt the Login
        $result = $this->authManager->authenticate($credentials, $remember);
		
		$projects = Project::join('customers','investitor_id','customers.id')->select('projects.*','customers.naziv as investitor')->get();
		
        // Return the appropriate response
        if(Sentinel::check() && Sentinel::inRole('voditelj'))  {
			return $result->dispatch(route('admin.dashboard'));
        } elseif(Sentinel::check() && Sentinel::inRole('administrator')) {
			return $result->dispatch(route('admin.dashboard'));
		} elseif(Sentinel::check() && Sentinel::inRole('kupac')) {
			return $result->dispatch(route('admin.dashboard'));
		} else {
			return $result->dispatch(route('auth.login.form'));
		}
		

    }

    /**
     * Handle a Logout Request
     * @return Response|Redirect
     */
    public function getLogout(Request $request)
    {
        // Terminate the user's current session.  Passing true as the
        // second parameter kills all of the user's active sessions.
        $result = $this->authManager->logout(null, null);

        // Return the appropriate response
        return $result->dispatch(route('index'));
    }
}
