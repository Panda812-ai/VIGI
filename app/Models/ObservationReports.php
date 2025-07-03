<?php

namespace App\Models;

use App\Enum\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\CameraRelationship;

class ObservationReports extends Model
{
    protected $guarded = [];

     protected $casts = [
        'status' =>  Status::class,
    ];
   


     public function ObservationRelationship(): BelongsTo
    {
        return $this->belongsTo(ObservationReports::class );
    }

    public function cameraRelationship()
    {
        return $this->belongsTo(Camera::class);
    }

    public function casetypeRelationship()
    {
        return $this->belongsTo(CaseType::class);
    }
}
