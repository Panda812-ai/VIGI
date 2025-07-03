<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enum\Status;

class Emergencycall extends Model
{
     protected $guarded = [];
     protected $fillable = [];

     protected $casts = [
        'status' =>  Status::class,
        'incident_date_time' => 'datetime',

    ];
}
