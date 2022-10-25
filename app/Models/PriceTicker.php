<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\Databank;
use App\Models\Sector;
use App\Models\Instrument;

class PriceTicker extends Model
{
    use HasFactory;
    
    protected $table = 'data_banks_eods';
    protected $fillable = ['id','open','high', 'low','close','volume','date'];	

    public function company(){
        return $this->belongsTo(Company::class)->select(['lasttradeprice', 'yclose']);
    }
    public function instrument(){
        return $this->belongsTo(Instrument::class)->select(['id','name']);
    }
    public function sector(){
        return $this->belongsTo(Sector::class)->select(['id', 'name']);
    }
}
