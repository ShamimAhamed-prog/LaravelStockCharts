<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Databank extends Model
{
    use HasFactory;
    protected $table = 'data_banks_eods';
    protected $fillable = ['id','open','high', 'low','close','volume'];		 
}
