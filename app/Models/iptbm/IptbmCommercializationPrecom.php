<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IptbmCommercializationPrecom extends Model
{
    use HasFactory;
    protected $fillable=[
        'technology_id',
        'pre_com_tech_name',
        'starting_capital',
        'return_of_investment',
        'breakeven',
        'commercialization_mode',
        'estimated_acquisition_cost',
        'income_gen_trans',
    ];

    public function technology(): BelongsTo
    {
        return $this->belongsTo(IptbmTechnologyProfile::class,'technology_id','id');
    }


    public function video()
    {
        return $this->hasMany(IptbmPrecomTechVideo::class,'commercialization_precoms_id','id');
    }
    public function modes()
    {
        return $this->hasMany(IptbmPrecomMode::class,'iptbm_commercialization_precoms_id','id');
    }

    public function market_study_files()
    {
        return $this->hasMany(IptbmPrecomMarketStudy::class,'iptbm_precoms_id','id');
    }

    public function valuation_summary_files()
    {
        return $this->hasMany(IptbmPrecomValuationSummary::class,'iptbm_precoms_id','id');
    }

    public function freedom_summary_files()
    {
        return $this->hasMany(IptbmPrecomFredOpSummary::class,'iptbm_precoms_id','id');
    }

    public function term_sheet_files()
    {
        return $this->hasMany(IptbmPrecomTermSheet::class,'iptbm_precoms_id','id');
    }

    public function license_agreement_copies()
    {
        return $this->hasMany(IptbmPrecomAgreementCopy::class,'iptbm_precoms_id','id');
    }
    public function financial_annalysis()
    {
        return $this->hasMany(IptbmPrecomFinancialAnnalysis::class,'iptbm_precoms_id','id');
    }
    public function testing_certification()
    {
        return $this->hasMany(IptbmPrecomTestingCertification::class,'iptbm_precoms_id','id');
    }

    public function feasibility_studies()
    {
        return $this->hasMany(IptbmPrecomFeasibilityStudy::class,'iptbm_precoms_id','id');
    }

    public function business_plan()
    {
        return $this->hasMany(IptbmPrecomBusinessPlan::class,'iptbm_precoms_id','id');
    }
    public function opinion_report()
    {
        return $this->hasMany(IptbmPrecomOpinionReport::class,'iptbm_precoms_id','id');
    }
}
