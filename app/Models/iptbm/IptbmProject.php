<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class   IptbmProject extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'ip_profile_id',
        'project_name',
        'project_leader',
        'implementation_period'
    ];

    public function profile(): BelongsTo
    {
        return $this->belongsTo(IptbmProfile::class,'ip_profile_id','id');
    }
    public function projectDetails(): HasMany
    {
        return $this->hasMany(IptbmProjectYearBudget::class,'iptbm_projects_id','id');
    }
}
