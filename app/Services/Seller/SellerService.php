<?php

namespace App\Services\Seller;

use App\Models\Seller\Seller;
use App\Models\Organisation;
use Illuminate\Support\Facades\Auth;


class SellerService
{

	public static function getSellers(Organisation $organisation)
	{
		//dd($organisation);
		$sellers = Seller::where('organisation_id', $organisation->id)
							->get();

		return $sellers;
	}
}