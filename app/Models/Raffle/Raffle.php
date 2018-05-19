<?php

namespace App\Models\Raffle;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Organisation;
use App\Models\Seller\Seller;

class Raffle extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    public function organisation()
    {
    	return $this->belongsTo(Organisation::class);
    }

    public function seller()
    {
    	return $this->belongsTo(Seller::class);
    }

    public function prize()
    {
    	return $this->hasMany(Prize::class);
    }
}
