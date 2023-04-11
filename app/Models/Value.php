<?php

namespace App\Models;

use App\Models\Kpi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Value extends Model
{
    use HasFactory;

    protected $table = 'value';
    protected $primaryKey = 'valueId';

    /**
     * Get all of the kpis for the Value
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kpis()
    {
        return $this->hasMany(Kpi::class, 'valueId', 'valueId');
    }
}
