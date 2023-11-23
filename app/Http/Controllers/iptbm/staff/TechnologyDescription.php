<?php

namespace App\Http\Controllers\iptbm\staff;

use App\Http\Controllers\Controller;
use App\Models\iptbm\IptbmAdoptor;
use App\Models\iptbm\IptbmFullTechDescription;
use App\Models\iptbm\IptbmTechnologyAdoptor;
use App\Models\iptbm\IptbmTechnologyProfile;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;


class TechnologyDescription extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IptbmFullTechDescription $id): Application|Factory|View|RedirectResponse
    {

        $technology_description = $id->load("technology_profile", "adoptors");


        $adops = IptbmAdoptor::all();


        return view('iptbm.staff.technologies.tech-description', [
            'technology_description' => $technology_description,
            'adoptors' => $adops
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): RedirectResponse
    {

        $request->validate([
            'tech_id' => 'required|unique:iptbm_full_tech_descriptions,iptbm_technology_profile_id',
        ]);
        $profile = IptbmTechnologyProfile::find($request->tech_id);
        $profile->full_description()->save(new IptbmFullTechDescription());
        return redirect()->back()->with("tech-description-success", "You may now update technology full description.");
    }


    public function update_narrative(Request $request, $id): RedirectResponse
    {

        $request->validate([
            'narrative' => 'required|min:10'
        ]);

        $tech = IptbmFullTechDescription::find($id);
        $tech->narrative = $request->narrative;
        $tech->save();
        return redirect()->back();
    }


    public function upload_tech_photo(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'tech_photo' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'desc_text' => 'required'
        ]);

        $photo_name = $request->tech_photo->hashName();
        $request->tech_photo->move(public_path('storage/images'), $photo_name);
        $tech = IptbmFullTechDescription::find($id);

        if (File::exists(public_path('storage/images/' . $tech->pictures_image))) {
            File::delete(public_path('storage/images/' . $tech->pictures_image));
        }
        $tech->pictures_image = $photo_name;
        $tech->pictures_text = $request->desc_text;
        $tech->save();
        return redirect()->back();
    }

    public function update_tech_desc(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'desc_text' => 'required'
        ]);

        $tech = IptbmFullTechDescription::find($id);
        $tech->pictures_text = $request->desc_text;
        $tech->save();
        return redirect()->back();
    }


    public function upload_tech_flow(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'tech_flow' => 'required|mimes:pdf|max:2048',
            'desc_text' => 'required'
        ]);

        $photo_name = $request->tech_flow->hashName();
        $request->tech_flow->move(public_path('storage/images'), $photo_name);
        $tech = IptbmFullTechDescription::find($id);

        if (File::exists(public_path('storage/images/' . $tech->process_pdf))) {
            File::delete(public_path('storage/images/' . $tech->process_pdf));
        }
        $tech->process_pdf = $photo_name;
        $tech->process_text = $request->desc_text;
        $tech->save();
        return redirect()->back();
    }

    public function update_tech_flow_desc(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'desc_text' => 'required'
        ]);

        $tech = IptbmFullTechDescription::find($id);
        $tech->process_text = $request->desc_text;
        $tech->save();
        return redirect()->back();
    }

    public function upload_requirements(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'tech_pdf' => 'required|mimes:pdf|max:2048',
            'req_text' => 'required|min:10'
        ]);

        $pdf_name = $request->tech_pdf->hashName();
        $request->tech_pdf->move(public_path('storage/images'), $pdf_name);
        $tech = IptbmFullTechDescription::find($id);

        if (File::exists(public_path('storage/images/' . $tech->requirement_image))) {
            File::delete(public_path('storage/images/' . $tech->requirement_image));
        }
        $tech->requirement_image = $pdf_name;
        $tech->requirement_text = $request->req_text;
        $tech->save();
        return redirect()->back();
    }

    public function update_req_desc(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'desc_text' => 'required'
        ]);

        $tech = IptbmFullTechDescription::find($id);
        $tech->requirement_text = $request->desc_text;
        $tech->save();
        return redirect()->back();
    }

    public function upload_other(Request $request, $id)
    {
        $request->validate([
            'tech_pdf' => 'required|mimes:pdf|max:2048',
            'req_text' => 'required|min:10'
        ]);
        $tech = IptbmFullTechDescription::find($id);
        if (!$tech) {
            return redirect()->route("iptbm.staff.technology");
        }

        $pdf_name = $request->tech_pdf->hashName();
        $request->tech_pdf->move(public_path('storage/images'), $pdf_name);


        if (File::exists(public_path('storage/images/' . $tech->other_documents_pdf))) {
            File::delete(public_path('storage/images/' . $tech->other_documents_pdf));
        }
        $tech->other_documents_pdf = $pdf_name;
        $tech->other_documents_text = $request->req_text;
        $tech->save();
        return redirect()->back();
    }

    public function update_other(Request $request, $id)
    {
        $request->validate([
            'desc_text' => 'required'
        ]);

        $tech = IptbmFullTechDescription::find($id);
        $tech->other_documents_text = $request->desc_text;
        $tech->save();
        return redirect()->back();
    }

    public function update_adoptor(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'adop' => [
                'required',
                Rule::unique(IptbmTechnologyAdoptor::class, 'adoptor_name')
                    ->where('full_tech_id', $id)
            ]
        ], [
            'adop.unique' => 'Selected data has already been taken.!',
            'adop.required' => 'No data was selected'
        ]);

        $desc = IptbmFullTechDescription::find($id);

        $data = array_map(function ($val) {
            return new IptbmTechnologyAdoptor([
                'adoptor_name' => $val
            ]);
        }, $request->adop);

        $desc->adoptors()->saveMany($data);

        return redirect()->back();
    }

    public function delete_adoptor(Request $request): RedirectResponse
    {
        IptbmTechnologyAdoptor::find($request->adopId)->delete();
        return redirect()->back()->with("adopt_del_success", "Data deleted successfully.!");
    }

    public function upload_tech_app_pdf(Request $request, $id): RedirectResponse
    {

        $request->validate([
            'tech_pdf' => 'required|mimes:pdf|max:2048',
            'req_text' => 'required|min:10'
        ]);
        $tech = IptbmFullTechDescription::find($id);
        if (!$tech) {
            return redirect()->route("iptbm.staff.technology");
        }
        $pdf_name = $request->tech_pdf->hashName();
        $request->tech_pdf->move(public_path('storage/images'), $pdf_name);


        if (File::exists(public_path('storage/images/' . $tech->application_of_tech_pdf))) {
            File::delete(public_path('storage/images/' . $tech->application_of_tech_pdf));
        }
        $tech->application_of_tech_pdf = $pdf_name;
        $tech->application_of_tech_text = $request->req_text;
        $tech->save();
        return redirect()->back();
    }

    public function update_tech_app_desc(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'desc_text' => 'required'
        ]);

        $tech = IptbmFullTechDescription::find($id);
        $tech->application_of_tech_text = $request->desc_text;
        $tech->save();
        return redirect()->back();
    }

    public function upload_market_pdf(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'tech_pdf' => 'required|mimes:pdf|max:2048',
            'req_text' => 'required|min:10'
        ]);
        $tech = IptbmFullTechDescription::find($id);
        if (!$tech) {
            return redirect()->route("iptbm.staff.technology");
        }
        $pdf_name = $request->tech_pdf->hashName();
        $request->tech_pdf->move(public_path('storage/images'), $pdf_name);


        if (File::exists(public_path('storage/images/' . $tech->market_potential_pdf))) {
            File::delete(public_path('storage/images/' . $tech->market_potential_pdf));
        }
        $tech->market_potential_pdf = $pdf_name;
        $tech->market_potential_text = $request->req_text;
        $tech->save();
        return redirect()->back();
    }

    public function update_market_desc(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'desc_text' => 'required'
        ]);

        $tech = IptbmFullTechDescription::find($id);
        $tech->market_potential_text = $request->desc_text;
        $tech->save();
        return redirect()->back();
    }

    /**
     * Significant of the technology
     */
    public function upload_signif_pdf(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'tech_pdf' => 'required|mimes:pdf|max:2048',
            'req_text' => 'required|min:10'
        ]);
        $tech = IptbmFullTechDescription::find($id);
        if (!$tech) {
            return redirect()->route("iptbm.staff.technology");
        }
        $pdf_name = $request->tech_pdf->hashName();
        $request->tech_pdf->move(public_path('storage/images'), $pdf_name);

        if (File::exists(public_path('storage/images/' . $tech->significant_pdf))) {
            File::delete(public_path('storage/images/' . $tech->significant_pdf));
        }

        $tech->significant_pdf = $pdf_name;
        $tech->significant_text = $request->req_text;
        $tech->save();
        return redirect()->back();
    }

    public function update_signif_desc(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'desc_text' => 'required'
        ]);

        $tech = IptbmFullTechDescription::find($id);
        $tech->significant_text = $request->desc_text;
        $tech->save();
        return redirect()->back();
    }

    public function upload_simil_pdf(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'tech_pdf' => 'required|mimes:pdf|max:2048',
            'req_text' => 'required|min:10'
        ]);

        $tech = IptbmFullTechDescription::find($id);
        if (!$tech) {
            return redirect()->route("iptbm.staff.technology");
        }
        $pdf_name = $request->tech_pdf->hashName();
        $request->tech_pdf->move(public_path('storage/images'), $pdf_name);

        if (File::exists(public_path('storage/images/' . $tech->similar_tech_pdf))) {
            File::delete(public_path('storage/images/' . $tech->similar_tech_pdf));
        }

        $tech->similar_tech_pdf = $pdf_name;
        $tech->similar_tech_text = $request->req_text;
        $tech->save();
        return redirect()->back();
    }

    public function update_simil_desc(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'desc_text' => 'required'
        ]);

        $tech = IptbmFullTechDescription::find($id);
        $tech->similar_tech_text = $request->desc_text;
        $tech->save();
        return redirect()->back();
    }

    public function upload_limmit_pdf(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'tech_pdf' => 'required|mimes:pdf|max:2048',
            'req_text' => 'required|min:10'
        ]);

        $tech = IptbmFullTechDescription::find($id);
        if (!$tech) {
            return redirect()->route("iptbm.staff.technology");
        }
        $pdf_name = $request->tech_pdf->hashName();
        $request->tech_pdf->move(public_path('storage/images'), $pdf_name);

        if (File::exists(public_path('storage/images/' . $tech->limitation_pdf))) {
            File::delete(public_path('storage/images/' . $tech->limitation_pdf));
        }

        $tech->limitation_pdf = $pdf_name;
        $tech->limitation_text = $request->req_text;
        $tech->save();
        return redirect()->back();
    }

    public function update_limmit_desc(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'desc_text' => 'required'
        ]);

        $tech = IptbmFullTechDescription::find($id);
        $tech->limitation_text = $request->desc_text;
        $tech->save();
        return redirect()->back();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}
