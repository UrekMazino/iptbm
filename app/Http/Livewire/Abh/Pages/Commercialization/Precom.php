<?php

namespace App\Http\Livewire\Abh\Pages\Commercialization;

use App\Models\iptbm\IptbmCommercializationPrecom;
use App\View\Components\abh\AbhLayout;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Precom extends Component
{
    public function render()
    {
        return view('livewire.abh.pages.commercialization.precom')
            ->with([
                'precom_tech' =>IptbmCommercializationPrecom::with([
                    'technology',
                    'video',
                    'modes',
                    'market_study_files',
                    'valuation_summary_files',
                    'freedom_summary_files',
                    'term_sheet_files',
                    'license_agreement_copies',
                    'financial_annalysis',
                    'testing_certification',
                    'feasibility_studies',
                    'business_plan',
                    'opinion_report'
                ])
                    ->whereHas('technology', function ($query) {
                        $query->whereDoesntHave('deployment')
                            ->whereDoesntHave('extension')
                            ->whereDoesntHave('commercial_adopters')
                            ->whereHas('iptbmprofiles.agency', function ($agency) {
                                $agency->where('name', Auth::user()->abh_profile->agency->name);
                            });
                    })
                    ->get()
            ])
            ->layout(AbhLayout::class);
    }
}
