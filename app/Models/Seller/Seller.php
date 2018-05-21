<?php

namespace App\Models\Seller;

use Illuminate\Database\Eloquent\Model;
use App\Models\Raffle\Raffle;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seller extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    public function raffle()
    {
    	return $this->hasMany(Raffle::class);
    }
}
