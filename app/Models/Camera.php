<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Camera extends Model
{
    protected $guarded = [];
    protected $fillable = [];

    public function cameraStatisticsRelationship(): HasMany
    {
        return $this->hasMany(CameraStatistics::class);
    }

    public function wasteRelationship(): HasMany
    {
        return $this->hasMany(Waste::class);
    }

     public function IncidentReportRelationship(): HasMany
    {
        return $this->hasMany(IncidentReport::class);
    }

     public function ObservationReportRelationship(): HasMany
    {
        return $this->hasMany(ObservationReports::class);
    }
}
