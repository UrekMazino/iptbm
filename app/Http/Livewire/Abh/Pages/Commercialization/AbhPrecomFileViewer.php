<?php

namespace App\Http\Livewire\Abh\Pages\Commercialization;

use App\Models\iptbm\IptbmCommercializationPrecom;
use App\View\Components\abh\AbhLayout;
use Livewire\Component;
use Illuminate\Http\Request;


class AbhPrecomFileViewer extends Component
{

    public $precom;
    public $file;
    public $type;
    public $returnPath;
    public function mount(Request $request, IptbmCommercializationPrecom $precom, $type)
    {


        $this->precom=$precom;
        $this->file=$request->query('fileurl');
        $this->type=$type;
        $this->returnPath=$request->query('back');

    }
    public function render()
    {
        return view('livewire.abh.pages.commercialization.abh-precom-file-viewer')
            ->layout(AbhLayout::class);
    }
}
