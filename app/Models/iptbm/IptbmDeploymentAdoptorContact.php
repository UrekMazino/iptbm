<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IptbmDeploymentAdoptorContact extends Model
{
    use HasFactory;
    protected $fillable=[
        'deployment_adopters_id',
        'type',
        'contact'
    ];

    public function deployment_adopter()
    {
        return $this->belongsTo(IptbmDeploymentPathway::class,'deployment_adopters_id','id');
    }

}
