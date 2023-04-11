<?php

namespace App\Models;

use App\Models\Kpi;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Strategy extends Model
{
    use HasFactory;

    protected $table = "strategy";
    protected $primaryKey = "strategyId";

    /**
     * Get all of the kpis for the Strategy
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
        return $this->hasMany(Project::class, 'strategyId', 'strategyId');
    }
}
