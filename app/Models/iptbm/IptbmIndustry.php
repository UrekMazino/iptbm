<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IptbmIndustry extends Model
{
    use HasFactory;
    protected $fillable=[
        'name'
    ];

    public function commodities(): HasMany
    {
        return $this->hasMany(IptbmCommodity::class,'iptbm_industry_id','id');
    }

    public function techcategory(): HasMany
    {
        return $this->hasMany(IptbmTechCategory::class,'iptbm_industry_id','id');
    }
}
