<?php

namespace App\Models\abh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AbhProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',
        'project_leader',
        'implementation_period'
    ];

    public function abh_profile(): BelongsTo
    {
        return $this->belongsTo(AbhProfile::class, 'abh_profile_id', 'id');
    }

    public function year_implemented(): HasMany
    {
        return $this->hasMany(AbhProjectImplementation::class, 'abh_projects_id', 'id');
    }


}
