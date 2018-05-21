<?php

namespace App\Services\Raffle;

use App\Models\Raffle\Raffle;
use App\Models\Seller\Seller;
use Illuminate\Support\Facades\Auth;


class RaffleService
{
    public static function getRaffles()
    {
        return Raffle::where('status', request('status'))
        				->where('organisation_id', request('org'))
        				->get();
    }


    public static function createRaffle(Raffle $raffle = null, Seller $seller = null)
    {
    	if ($seller === null) {
    		throw new Exception("Seller is required", 1);
    		return false;
    	}	

    	if ($raffle === null) {
    		$raffle = new Raffle();
    	}

    	if (request('organisation_id') == 0) {  

    		throw new Exception("Organisation is required", 1);
    		return false;
    		
    	}

    	$status = request('status') == null ? request('status') : 'Draft';

    	$raffle->organisation_id  	= request('organisation_id');
    	$raffle->name 				= request('name');
    	$raffle->price 				= request('price');
    	$raffle->end_date 			= request('end_date');
    	$raffle->draw_date 			= request('draw_date');
    	$raffle->max_tickets 		= request('max_tickets');
    	$raffle->status 			= $status;
    	$raffle->user_id			= Auth::id();

    	$raffle->save();

    	return $raffle;
    }

}