<?php

namespace App\Http\Controllers\iptbm\staff;

use App\Http\Controllers\Controller;
use App\Models\iptbm\FairnessOpenionReport;
use App\Models\iptbm\IptbmCommercializationPrecom;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

class PrecomDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id): Application|Factory|View|RedirectResponse
    {

        $precom = IptbmCommercializationPrecom::with('technology','video','modes',
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
        )->find($id);
        if (!$precom) {
            return redirect()->route('iptbm.staff.precom.index');
        }


        return view('iptbm.staff.precom.precom_details', [

            'precom' => $precom
        ]);
    }

    public function update_market_summary(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'masketSum' => 'required|mimes:pdf|max:2048',
        ], [
            'masketSum.required' => 'No file provided',
            'masketSum.max' => 'file size exceeds'
        ]);

        $precom = IptbmCommercializationPrecom::find($id);
        $pdfName = $request->masketSum->hashName();
        $request->masketSum->move(public_path('storage/precom'), $pdfName);

        if (File::exists(public_path($precom->market_study_summary))) {
            File::delete(public_path($precom->market_study_summary));
        }
        $precom->market_study_summary = 'storage/precom/' . $pdfName;

        $precom->save();
        return redirect()->back();
    }

    public function update_capital(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'capital' => 'required'
        ], [
            'capital.required' => 'Please enter valid amount'
        ]);
        $precom = IptbmCommercializationPrecom::find($id);
        $precom->starting_capital = $request->capital;
        $precom->save();
        return redirect()->back();
    }

    public function return_investment(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'retInvest' => 'required'
        ], [
            'retInvest.required' => 'Please enter valid amount'
        ]);
        $precom = IptbmCommercializationPrecom::find($id);
        $precom->return_of_investment = $request->retInvest;
        $precom->save();
        return redirect()->back();
    }

    public function breakeven(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'breakEv' => 'required'
        ], [
            'breakEv.required' => 'Please enter valid amount'
        ]);
        $precom = IptbmCommercializationPrecom::find($id);
        $precom->breakeven = $request->breakEv;
        $precom->save();
        return redirect()->back();
    }

    public function valuation_summary(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'valuation' => 'required|mimes:pdf|max:2048',
        ], [
            'valuation.required' => 'No file provided',
            'valuation.max' => 'file size exceeds'
        ]);

        $precom = IptbmCommercializationPrecom::find($id);
        $pdfName = $request->valuation->hashName();
        $request->valuation->move(public_path('storage/precom'), $pdfName);

        if (File::exists(public_path($precom->valuation_summary))) {
            File::delete(public_path($precom->valuation_summary));
        }
        $precom->valuation_summary = 'storage/precom/' . $pdfName;

        $precom->save();
        return redirect()->back();
    }

    public function freedom_operate(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'freedToOp' => 'required|mimes:pdf|max:2048',
        ], [
            'freedToOp.required' => 'No file provided',
            'freedToOp.max' => 'file size exceeds'
        ]);

        $precom = IptbmCommercializationPrecom::find($id);
        $pdfName = $request->freedToOp->hashName();
        $request->freedToOp->move(public_path('storage/precom'), $pdfName);

        if (File::exists(public_path($precom->freedom_operate_summary))) {
            File::delete(public_path($precom->freedom_operate_summary));
        }
        $precom->freedom_operate_summary = 'storage/precom/' . $pdfName;

        $precom->save();
        return redirect()->back();
    }

    public function term_sheet(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'termShet' => 'required|mimes:pdf|max:2048',
        ], [
            'termShet.required' => 'No file provided',
            'termShet.max' => 'file size exceeds'
        ]);

        $precom = IptbmCommercializationPrecom::find($id);
        $pdfName = $request->termShet->hashName();
        $request->termShet->move(public_path('storage/precom'), $pdfName);

        if (File::exists(public_path($precom->proposed_term_sheet))) {
            File::delete(public_path($precom->proposed_term_sheet));
        }
        $precom->proposed_term_sheet = 'storage/precom/' . $pdfName;

        $precom->save();
        return redirect()->back();
    }

    public function opinion_report(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'opinion_report' => 'required|mimes:pdf|max:2048',

        ], [
            'opinion_report.required' => 'No file provided',
            'opinion_report.max' => 'file size exceeds'
        ]);

        $precom = IptbmCommercializationPrecom::find($id);
        $pdfName = $request->opinion_report->hashName();
        $request->opinion_report->move(public_path('storage/precom'), $pdfName);

        $precom->opinion_report()->saveMany([
            new FairnessOpenionReport([
                'pdf_file' => 'storage/precom/' . $pdfName
            ])
        ]);

        return redirect()->back();
    }

    public function delete_report(Request $request)
    {
        $request->validate(['reportId' => 'required']);

        $report = FairnessOpenionReport::find($request->reportId);


        if (File::exists(public_path($report->pdf_file))) {
            File::delete(public_path($report->pdf_file));
        }

        $report->delete();
        return redirect()->back();

    }




    public function update_mode(Request $request,$id): RedirectResponse
    {
        $request->validate([
            'com_mode'=>'required',
        ],[
            'com_mode.required'=>'Invalid input.'
        ]);
        $precom=IptbmCommercializationPrecom::find($id);
        $precom->commercialization_mode=$request->com_mode;
        $precom->save();
        return redirect()->back();
    }
    public function update_cost_amount(Request $request,$id)
    {
        $request->validate([
            'cost_amount'=>'required',
        ],[
            'cost_amount.required'=>'Please enter a valid amount.'
        ]);
        $precom=IptbmCommercializationPrecom::find($id);
        $precom->estimated_acquisition_cost=$request->cost_amount;
        $precom->save();
        return redirect()->back();
    }

    public function update_clip(Request $request,$id): RedirectResponse
    {
        $request->validate([
            'video_url'=>'required',
        ]);
        $precom=IptbmCommercializationPrecom::find($id);
        $precom->video_clips=$request->video_url;
        $precom->save();
        return redirect()->back();
    }

    public function upload_license_copy(Request $request,$id): RedirectResponse
    {
        $request->validate([
            'license_file' => 'required|mimes:pdf|max:2048',
        ], [
            'license_file.required' => 'No file provided',
            'license_file.max' => 'file size exceeds'
        ]);

        $precom = IptbmCommercializationPrecom::find($id);
        $pdfName = $request->license_file->hashName();
        $request->license_file->move(public_path('storage/precom'), $pdfName);

        if (File::exists(public_path($precom->agreement_copy))) {
            File::delete(public_path($precom->agreement_copy));
        }
        $precom->agreement_copy = 'storage/precom/' . $pdfName;

        $precom->save();
        return redirect()->back();
    }

    public function upload_finance_copy(Request $request,$id): RedirectResponse
    {
        $request->validate([
            'finance_file' => 'required|mimes:pdf|max:2048',
        ], [
            'finance_file.required' => 'No file provided',
            'finance_file.max' => 'file size exceeds'
        ]);

        $precom = IptbmCommercializationPrecom::find($id);
        $pdfName = $request->finance_file->hashName();
        $request->finance_file->move(public_path('storage/precom'), $pdfName);

        if (File::exists(public_path($precom->financial_analysis))) {
            File::delete(public_path($precom->financial_analysis));
        }
        $precom->financial_analysis = 'storage/precom/' . $pdfName;

        $precom->save();
        return redirect()->back();
    }
    public function upload_machine_cert_copy(Request $request,$id): RedirectResponse
    {
        $request->validate([
            'machine_cert' => 'required|mimes:pdf|max:2048',
        ], [
            'machine_cert.required' => 'No file provided',
            'machine_cert.max' => 'file size exceeds'
        ]);

        $precom = IptbmCommercializationPrecom::find($id);
        $pdfName = $request->machine_cert->hashName();
        $request->machine_cert->move(public_path('storage/precom'), $pdfName);

        if (File::exists(public_path($precom->mach_test_cert))) {
            File::delete(public_path($precom->mach_test_cert));
        }
        $precom->mach_test_cert = 'storage/precom/' . $pdfName;

        $precom->save();
        return redirect()->back();
    }
    public function upload_feasibility_study(Request $request,$id): RedirectResponse
    {
        $request->validate([
            'feasibility_file' => 'required|mimes:pdf|max:2048',
        ], [
            'feasibility_file.required' => 'No file provided',
            'feasibility_file.max' => 'file size exceeds'
        ]);

        $precom = IptbmCommercializationPrecom::find($id);
        $pdfName = $request->feasibility_file->hashName();
        $request->feasibility_file->move(public_path('storage/precom'), $pdfName);

        if (File::exists(public_path($precom->feasibility_study))) {
            File::delete(public_path($precom->feasibility_study));
        }
        $precom->feasibility_study = 'storage/precom/' . $pdfName;

        $precom->save();
        return redirect()->back();
    }
    public function upload_business_model(Request $request,$id): RedirectResponse
    {
        $request->validate([
            'business_model' => 'required|mimes:pdf|max:2048',
        ], [
            'business_model.required' => 'No file provided',
            'business_model.max' => 'file size exceeds'
        ]);

        $precom = IptbmCommercializationPrecom::find($id);
        $pdfName = $request->business_model->hashName();
        $request->business_model->move(public_path('storage/precom'), $pdfName);

        if (File::exists(public_path($precom->business_model))) {
            File::delete(public_path($precom->business_model));
        }
        $precom->business_model = 'storage/precom/' . $pdfName;

        $precom->save();
        return redirect()->back();
    }
    public function update_income_gen(Request $request,$id): RedirectResponse
    {
        $request->validate([
            'income_gen'=>'required',
        ],[
            'income_gen.required'=>'Please enter a valid amount.'
        ]);
        $precom=IptbmCommercializationPrecom::find($id);
        $precom->income_gen_trans=$request->income_gen;
        $precom->save();
        return redirect()->back();
    }
}
