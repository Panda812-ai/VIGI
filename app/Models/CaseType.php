<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseType extends Model
{
    protected $guarded = [];
    protected $fillable = [];

    public function observationRelationship()
    {
        return $this->hasMany(ObservationReports::class);
    }

    public function incidentRelationship()
    {
        return $this->hasMany(IncidentReport::class);
    }


}
