<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Enum\Status;


class IncidentReport extends Model
{

        protected $guarded= [];

    protected $casts = [
        'images' => 'array',
        'status' =>  Status::class,
        'incident_date_time' => 'datetime',
    ];



     public function CameraRelationship(): BelongsTo
    {
        return $this->belongsTo(Camera::class);
    }

    public function casetypeRelationship()
    {
        return $this->belongsTo(CaseType::class);
    }
}
