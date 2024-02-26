<?php

namespace App\Http\Livewire\Abh\Pages\Commercialization;

use App\Models\iptbm\IptbmCommercializationPrecom;
use App\View\Components\abh\AbhLayout;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use SebastianBergmann\CodeCoverage\Exception;
use Storage;

class Precom extends Component
{

    public function deletePrecom(IptbmCommercializationPrecom $precom)
    {

        $this->delete_files($precom->market_study_files);
        $this->delete_files($precom->valuation_summary_files);
        $this->delete_files($precom->freedom_summary_files);
        $this->delete_files($precom->term_sheet_files);
        $this->delete_files($precom->license_agreement_copies);
        $this->delete_files($precom->financial_annalysis);
        $this->delete_files($precom->testing_certification);
        $this->delete_files($precom->feasibility_studies);
        $this->delete_files($precom->business_plan);
        $this->delete_files($precom->opinion_report);
        $this->delete_video($precom->video);

        $precom->delete();
        $this->emit('reloadPage');
    }

    public function delete_files($data)
    {
        foreach ($data as $file)
        {
            if(Storage::exists($file->file))
            {
                Storage::delete($file->file);
            }
        }
    }

    public function delete_video($data)
    {
        foreach ($data as $file)
        {
            if($file->type==='local')
            {
                if(Storage::exists($file->url))
                {
                    Storage::delete($file->url);
                }
            }
        }
    }
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
