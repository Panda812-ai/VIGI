<?php

namespace App\Models;

use App\Enum\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Waste extends Model
{

    protected $fillable = [];
    protected $guarded = [];

     protected $casts = [
        'status' =>  Status::class,
    ];

    public function CameraRelationship(): BelongsTo
    {
        return $this->belongsTo(Camera::class);
    }
}
