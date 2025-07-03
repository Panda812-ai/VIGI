<?php

namespace App\Models;

use App\Enum\CameraStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CameraStatistics extends Model
{
    protected $fillable = [];
    protected $guarded = [];

    protected $casts = [
        'status' =>  CameraStatus::class,
    ];

    public function cameraRelationship(): BelongsTo
    {
        return $this->belongsTo(Camera::class);
    }

}
