<?php

namespace App\Http\Livewire\Iptbm\Staff\Technology\Fulltechdescription;

use App\Models\iptbm\IptbmAdoptor;
use App\Models\iptbm\IptbmFullTechDescription;
use App\Models\iptbm\IptbmTechnologyAdoptor;
use App\Models\iptbm\IptbmTechnologyProfile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

use Spatie\PdfToImage\Exceptions\PdfDoesNotExist;
use Spatie\PdfToImage\Pdf;

class Description extends Component
{
    use WithFileUploads;
    public $narrative;
    public $viewNarative;


    public $technologyPicture;
    public $viewTechnologyPicture;

    public $processFlow;
    public $viewProcessFlow;


    public $requirements;
    public $viewRequirements;

    public $otherDocuments;
    public $viewOtherDocuments;

    public $techApplication;
    public $viewTechApplication;

    public $otherApplications;
    public $viewOtherApplications;


    public $techSignificant;
    public $viewTechSignificant;

    public $similarTech;
    public $viewSimilarTech;

    public $techLimmitation;
    public $viewTechLimmitation;



    public $adoptorModel;

    public $adaptors;
    public $showOtherAdoptors=false;

    public $listeners=[
        'updateAdoptor'
    ];
    public function updateAdoptor()
    {
        $this->technology_description->refresh();
    }

    public function showOtherAdoptors()
    {
        $this->showOtherAdoptors=!$this->showOtherAdoptors;
        $this->resetValidation('adoptorModel');
    }

    public function saveAdoptor()
    {
        $this->validateOnly('adoptorModel');
        $this->technology_description->adoptors()->save(new IptbmTechnologyAdoptor([
            'adoptor_name'=>$this->adoptorModel
        ]));
        $this->technology_description->save();
        $this->technology_description->refresh();
        $this->emit('reloadPage');
    }

    /**
     * @throws PdfDoesNotExist
     */


    public $technology_description;


    public function saveNarrative()
    {
        $this->validateOnly('narrative');





        if($this->technology_description->narrative)
        {
            if (Storage::exists($this->technology_description->narrative)) {
                Storage::delete($this->technology_description->narrative);
            }
        }
        $path=$this->narrative->store('public/technology_attachments');
        $this->technology_description->narrative=$path;
        $this->technology_description->save();
        $this->emit('reloadPage');

    }
    public function saveTechnologyPicture()
    {
        $this->validateOnly('technologyPicture');
        if($this->technology_description->pictures_pdf)
        {
            if (Storage::exists($this->technology_description->pictures_pdf)) {
                Storage::delete($this->technology_description->pictures_pdf);
            }
        }
        $pathTech=$this->technologyPicture->store('public/technology_attachments');
        $this->technology_description->pictures_pdf=$pathTech;
        $this->technology_description->save();
        $this->technology_description->refresh();

        $this->emit('reloadPage');
        $this->viewTechnologyPicture=$this->technology_description->pictures_pdf;
    }
    public function saveProcessFlow()
    {
        $this->validateOnly('processFlow');



        $path=$this->processFlow->store('public/technology_attachments');
        $this->technology_description->process_pdf=$path;
        $this->technology_description->save();
        $this->technology_description->refresh();
        if($this->viewProcessFlow)
        {
            if (Storage::exists($this->viewProcessFlow)) {
                Storage::delete($this->viewProcessFlow);
            }
        }
        $this->emit('reloadPage');
        $this->viewProcessFlow=$this->technology_description->process_pdf;
    }
    public function saveRequirements()
    {
        $this->validateOnly('requirements');



        $path=$this->requirements->store('public/technology_attachments');
        $this->technology_description->requirement_pdf=$path;
        $this->technology_description->save();
        $this->technology_description->refresh();
        if($this->viewRequirements)
        {
            if (Storage::exists($this->viewRequirements)) {
                Storage::delete($this->viewRequirements);
            }
        }
        $this->emit('reloadPage');
        $this->viewRequirements=$this->technology_description->requirement_pdf;
    }
    public function saveOtherDocuments()
    {
        $this->validateOnly('otherDocuments');



        $path=$this->otherDocuments->store('public/technology_attachments');
        $this->technology_description->other_documents_pdf=$path;
        $this->technology_description->save();
        $this->technology_description->refresh();
        if($this->viewOtherDocuments)
        {
            if (Storage::exists($this->viewOtherDocuments)) {
                Storage::delete($this->viewOtherDocuments);
            }
        }
        $this->emit('reloadPage');
        $this->viewOtherDocuments=$this->technology_description->other_documents_pdf;
    }
    public function saveTechApplication()
    {
        $this->validateOnly('techApplication');



        $path=$this->techApplication->store('public/technology_attachments');
        $this->technology_description->application_of_tech_pdf=$path;
        $this->technology_description->save();
        $this->technology_description->refresh();
        if($this->viewTechApplication)
        {
            if (Storage::exists($this->viewTechApplication)) {
                Storage::delete($this->viewTechApplication);
            }
        }
        $this->emit('reloadPage');
        $this->viewTechApplication=$this->technology_description->application_of_tech_pdf;
    }
    public function saveOtherApplications()
    {
        $this->validateOnly('otherApplications');
        $path=$this->otherApplications->store('public/technology_attachments');
        $this->technology_description->other_application_pdf=$path;
        $this->technology_description->save();
        $this->technology_description->refresh();
        if($this->viewOtherApplications)
        {
            if (Storage::exists($this->viewOtherApplications)) {
                Storage::delete($this->viewOtherApplications);
            }
        }
        $this->emit('reloadPage');
        $this->viewOtherApplications=$this->technology_description->other_application_pdf;
    }
    public function saveTechSignificant()
    {
        $this->validateOnly('techSignificant');
        $path=$this->techSignificant->store('public/technology_attachments');
        $this->technology_description->significant_pdf=$path;
        $this->technology_description->save();
        $this->technology_description->refresh();
        if($this->viewTechSignificant)
        {
            if (Storage::exists($this->viewTechSignificant)) {
                Storage::delete($this->viewTechSignificant);
            }
        }
        $this->emit('reloadPage');
        $this->viewTechSignificant=$this->technology_description->significant_pdf;
    }
    public function saveTechLimmitation()
    {
        $this->validateOnly('techLimmitation');
        $path=$this->techLimmitation->store('public/technology_attachments');
        $this->technology_description->limitation_pdf=$path;
        $this->technology_description->save();
        $this->technology_description->refresh();
        if($this->viewTechLimmitation)
        {
            if (Storage::exists($this->viewTechLimmitation)) {
                Storage::delete($this->viewTechLimmitation);
            }
        }
        $this->emit('reloadPage');
        $this->viewTechLimmitation=$this->technology_description->limitation_pdf;
    }


    public function saveSimilarTech()
    {
        $this->validateOnly('similarTech');
        $path=$this->similarTech->store('public/technology_attachments');
        $this->technology_description->similar_tech_pdf=$path;
        $this->technology_description->save();
        $this->technology_description->refresh();
        if($this->viewSimilarTech)
        {
            if (Storage::exists($this->viewSimilarTech)) {
                Storage::delete($this->viewSimilarTech);
            }
        }
        $this->emit('reloadPage');
        $this->viewSimilarTech=$this->technology_description->similar_tech_pdf;
    }






    public function rules()
    {
        return[
            'narrative'=>[
                'required',
                'mimes:pdf'
            ],
            'technologyPicture'=>[
                'required',
                'mimes:pdf'
            ],
            'processFlow'=>[
                'required',
                'mimes:pdf'
            ],
            'requirements'=>[
                'required',
                'mimes:pdf'
            ],
            'otherDocuments'=>[
                'required',
                'mimes:pdf'
            ],
            'adoptorModel'=>[
                'required',
                'min:3',
                Rule::unique(IptbmTechnologyAdoptor::class,'adoptor_name')->where('full_tech_id',$this->technology_description->id)
            ],
            'techApplication'=>[
                'required',
                'mimes:pdf'
            ],
            'otherApplications'=>[
                'required',
                'mimes:pdf'
            ],
            'techSignificant'=>[
                'required',
                'mimes:pdf'
            ],
            'techLimmitation'=>[
                'required',
                'mimes:pdf'
            ]


        ];
    }

    /**
     * @throws PdfDoesNotExist
     */


    public function updated($properties)
    {
        $this->validateOnly($properties);
    }

    public function mount($technology_description)
    {
        $this->technology_description=$technology_description;
        $this->viewNarative=$this->technology_description->narrative;
        $this->viewTechnologyPicture=$this->technology_description->pictures_pdf;
        $this->viewOtherDocuments=$this->technology_description->other_documents_pdf;
        $this->viewProcessFlow=$this->technology_description->process_pdf;
        $this->viewRequirements=$this->technology_description->requirement_pdf;
        $this->viewTechApplication=$this->technology_description->application_of_tech_pdf;
        $this->viewOtherApplications=$this->technology_description->other_application_pdf;
        $this->viewTechSignificant=$this->technology_description->significant_pdf;
        $this->viewSimilarTech=$this->technology_description->similar_tech_pdf;
        $this->viewTechLimmitation=$this->technology_description->limitation_pdf;
        $this->adaptors=IptbmAdoptor::all();
    }
    public function render()
    {
        return view('livewire.iptbm.staff.technology.fulltechdescription.description');
    }
}
