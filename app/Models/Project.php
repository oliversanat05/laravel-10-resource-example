<?php

namespace App\Models;

use App\Models\Strategy;
use App\Models\CriticalActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $table = "project";
    protected $primaryKey = "projectId";

    /**
     * Get all of the strategies for the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function criticalActivities()
    {
        return $this->hasMany(CriticalActivity::class, 'projectId', 'projectId');
    }
}
