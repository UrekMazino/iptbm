<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IptbmProjectYearBudget extends Model
{
    use HasFactory;
    protected $fillable=[
        'iptbm_projects_id',
        'date_implemented_start',
        'date_implemented_end',
        'change_of_implementation' ,
        'extended_duration',
        'extendable',
        'year_budget'
    ];
    public function project()
    {
        return $this->belongsTo(IptbmProject::class,'iptbm_projects_id','id');
    }
}
