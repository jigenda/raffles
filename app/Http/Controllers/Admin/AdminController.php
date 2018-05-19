<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Models\Organisation;
use App\Services\Organisation\OrganisationService;



class AdminController extends Controller
{
	// use AuthenticatesUsers;

	// /**
 //     * Where to redirect users after login.
 //     *
 //     * @var string
 //     */
 //    protected $redirectTo = '/home';
 //    *
 //     * Create a new controller instance.
 //     *
 //     * @return void
     
     
 //    public function __construct()
 //    {
 //        $this->middleware('guest')->except('logout');
 //    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
    	$organisations = OrganisationService::getOrganisations();
    	 
        return view('admin.dashboard')
        		->with('records', $organisations);
    }
}
