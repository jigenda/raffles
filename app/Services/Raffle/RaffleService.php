<?php

namespace App\Services\Raffle;

use App\Models\Raffle\Raffle;
use App\Models\Seller\Seller;
use Illuminate\Support\Facades\Auth;
use \Carbon\Carbon;

class RaffleService
{
    public static function getRaffles()
    {
        return Raffle::where('status', request('status'))
        				->where('organisation_id', request('org'))
        				->get();
    }


    public static function createRaffle(Raffle $raffle = null)
    {
    	
    	if ($raffle === null) {
    		$raffle = new Raffle();
    	}

    	if (request('organisation_id') == 0) {  

    		throw new \Exception("Organisation is required", 1);
    		return false;
    		
    	}

    	$status = request('status') != null ? request('status') : 'Draft';
  
    	$raffle->organisation_id  	= request('organisation_id');
    	$raffle->name 				= request('name');
    	$raffle->price 				= request('price');
    	$raffle->draw_location		= request('draw_location');
    	$raffle->end_date 			= Carbon::createFromFormat('d/m/Y', request('end_date'))->format('Y-m-d');
    	$raffle->draw_date 			= Carbon::createFromFormat('d/m/Y', request('draw_date'))->format('Y-m-d');
    	$raffle->max_tickets 		= request('max_tickets');
    	$raffle->status 			= $status;
    	$raffle->user_id			= Auth::id();
    	$raffle->seller_id			= Auth::id();

    	$raffle->save();

    	return $raffle;
    }

}