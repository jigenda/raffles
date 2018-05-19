<?php

namespace App\Services\Organisation;

use App\Models\Organisation;
use Illuminate\Support\Facades\Auth;

class OrganisationService
{
    public static function delete(Organisation $organisation)
    {
        return $organisation->delete();
    }

    public static function getOrganisations()
    {
        $organisations = new Organisation();

        $organisations = $organisations->pluck('name', 'id');

	    $organisations->prepend('Select An Organisation', 0);

        return $organisations->toArray();
    }

    public static function search()
    {
        $organisations = new Organisation();

	    // visual search
	    if (request('search'))
	    {
		    $searchArray = json_decode(request('search'), true);
		    if (count($searchArray) > 0) {
			    foreach ($searchArray as $search) {
				    foreach ($search as $key => $value) {
					    switch ($key) {
						    case ('Organisation'):
							    $organisations = $organisations->where('name','LIKE', '%'.$value.'%');
							    break;
					    }
				    }
			    }
		    }
	    }

        if (request('q'))
        {
            $organisations = $organisations->where('name','LIKE', '%'.request('q').'%');
        }
        $organisations = $organisations->orderBy('name', 'asc')->paginate(40);

        return $organisations;
    }

}