<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IptbmFullTechDescription extends Model
{
    use HasFactory;
    protected $fillable=[
        'iptbm_technology_profile_id',
        'narrative',
        'pictures_text',
        'pictures_pdf',
        'pictures_image',
        'process_text',
        'process_pdf',
        'process_image',
        'requirement_pdf',
        'requirement_text',
        'other_documents_text',
        'other_documents_pdf',
        'application_of_tech_text',
        'application_of_tech_pdf',
        'application_of_tech_image',
        'other_application_text',
        'other_application_pdf',
        'other_application_image',
        'market_potential_text',
        'market_potential_pdf',
        'market_potential_image',
        'significant_text',
        'significant_pdf',
        'significant_image',
        'similar_tech_text',
        'similar_tech_pdf',
        'similar_tech_email',
        'limitation_text',
        'limitation_pdf',
        'limitation_image',
    ];

    public function technology_profile(): BelongsTo
    {
        return $this->belongsTo(IptbmTechnologyProfile::class,"iptbm_technology_profile_id","id");
    }

    public function adoptors(): HasMany
    {
        return $this->hasMany(IptbmTechnologyAdoptor::class,'full_tech_id','id');
    }
}
