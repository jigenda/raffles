<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Seller\SellerService;
use App\Models\Organisation;
use App\User;

use App\Services\Organisation\OrganisationService;

class SellerController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
    	$organisations = OrganisationService::getOrganisations();
    	 
        return view('seller.dashboard')
        		->with('records', $organisations);
    }


    public function getSellers()
    {
    	$sellers = User::sellers();//where('role_id', 2)->get();
    	foreach ($sellers as $seller) {

    	}
    	dd($sellers);
    	$result = SellerService::getSellers($organisation);

    	return $result;
    }
}
