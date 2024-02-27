<?php

namespace App\Http\Livewire\Abh\Admin\Pages\TechTrans\CommercializationPathway;

use App\Models\iptbm\IptbmCommercializationPrecom;
use App\View\Components\abh\admin\AbhAdminApp;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AbhPrecomPage extends Component
{
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.abh.admin.pages.techtrans.commercialization-pathway.abh-precom-page')
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
                            ->whereDoesntHave('commercial_adopters');

                    })
                    ->get()
            ])
            ->layout(AbhAdminApp::class);
    }
}
