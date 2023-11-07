<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;


class IptbmInventor extends Model
{
    use HasFactory;
    protected $fillable=[
        'name' ,
        'middle_name' ,
        'last_name' ,
        'suffixes',
        'address',
        'agency',
        'status'
    ];
    public function toSearchableArray()
    {
        return [
            'name'=>$this->title,
            'agency'=>$this->year_developed,
            'status'=>$this->status
        ];
    }
    public function agency_name(): BelongsTo
    {
        return $this->belongsTo(IptbmAgency::class,'agency','id');
    }
    public function expertise(): HasMany
    {
        return $this->hasMany(IptbmInventorExpertise::class,'iptbm_inventor_id','id');
    }
    public function contacts(): HasMany
    {
        return $this->hasMany(IptbmInventorContact::class,"iptbm_inventor_id","id");
    }

    public function technologies(): HasMany
    {
        return $this->hasMany(IptbmTechInventor::class,'iptbm_inventors_id','id');
    }

    public function latest_agency_affiliation(): HasMany
    {
        return $this->hasMany(InventorAgencyAffiliation::class,'iptbm_inventors_id','id');
    }
}
