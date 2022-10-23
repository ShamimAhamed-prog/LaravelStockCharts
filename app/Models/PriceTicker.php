<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\Databank;
use App\Models\Sector;

class PriceTicker extends Model
{
    use HasFactory;

    public function company(){
        return $this->belongsTo(Company::class)->select(['lasttradeprice', 'yclose']);
    }

    public function databank(){
        return $this->belongsTo(Databank::class)->select(['open','high','close','low','volume']);
    }
    public function sector(){
        return $this->belongsTo(Sector::class)->select(['id', 'name']);
    }
}
