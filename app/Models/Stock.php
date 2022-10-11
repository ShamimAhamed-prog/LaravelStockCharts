<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 
use App\Models\Instrument;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'index_values';
    protected $fillable = ['id', 'market_id', 'instrument_id', 'capital_value', 'deviation', 'percentage_deviation', 'date_time', 'index_date', 'index_time'];

    public function investor(){
        return $this->belongsTo(Instrument::class);
    }
}


