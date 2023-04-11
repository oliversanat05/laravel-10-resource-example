<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CriticalActivity extends Model
{
    use HasFactory;

    protected $table = "criticalActivity";
    protected $primaryKey = "criticalActivityId";
}
