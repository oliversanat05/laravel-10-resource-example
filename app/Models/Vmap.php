<?php

namespace App\Models;

use App\Models\Value;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vmap extends Model
{
    use HasFactory;

    protected $table = 'vMap';
    protected $primaryKey = 'vMapId';


    /**
     * Get all of the values for the Vmap
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function values()
    {
        return $this->hasMany(Value::class, 'vMapId', 'vMapId');
    }


}
