<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IptbmProjectYearBudget extends Model
{
    use HasFactory;

    protected $fillable = [
        'iptbm_projects_id',
        'date_start',
        'duration',
        'extended_duration',
        'year_budget'
    ];

    public function project()
    {
        return $this->belongsTo(IptbmProject::class, 'iptbm_projects_id', 'id');
    }
}
