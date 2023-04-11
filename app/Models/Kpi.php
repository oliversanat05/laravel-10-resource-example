<?php

namespace App\Models;

use App\Models\Strategy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kpi extends Model
{
    use HasFactory;

    protected $table = 'kpi';
    protected $primaryKey = 'kpiId';

    /**
     * Get all of the strategies for the Kpi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function strategies()
    {
        return $this->hasMany(Strategy::class, 'kpiId', 'kpiId');
    }
}
