<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Raffle;
use App\Services\Raffle\RaffleService;
use App\Services\Seller\SellerService;

class RaffleController extends Controller
{
    public function getRaffles()
    {
    	
    	$result = RaffleService::getRaffles();

    	return $result;
    }

    public function createRaffle()
    {
    	$result = RaffleService::createRaffle();
    }
}
