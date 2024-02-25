<?php

namespace App\Http\Livewire\Abh\Component\Precom;

use App\Models\iptbm\IptbmPrecomTechVideo;
use App\Rules\YoutubeOrGoogleDriveVideo;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AbhTechVideo extends Component
{
    use WithFileUploads;
    public $precom;

    public $thumbnail;
    public $localVideo;
    public $description;
    public $onlineVideo;


    public function deleteVideo($video): void
    {

        $this->precom->video->find($video['id'])->delete();
        $this->deleteFile($video['url']);
        $this->emit('reloadPage');
    }

    public function deleteFile($path)
    {
        if ($path) {
            if (Storage::exists($path)) {
                Storage::delete($path);
            }
        }


    }
    public function saveLocalVideo()
    {
        $this->validateOnly('localVideo');
        $this->validateOnly('description');
        $path = $this->localVideo->store("public/precom");
        $this->precom->video()->save(new IptbmPrecomTechVideo([
            'type' => 'local',
            'description' => $this->description,
            'url' => $path
        ]));

        $this->emit('reloadPage');
    }
    public function uploadVideo()
    {
        $video = str_replace(
            [
                'width="560" height="315" ',
                'width="640" height="480" ',
                '<iframe src="',
                '" width="640" height="480"',
                'allow="autoplay"></iframe>',
                '<iframe width="560" height="315" src="',
                '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>'
            ], '', $this->onlineVideo);
        $this->onlineVideo = str_replace([" ", '"',], '', $video);
        $this->validate([
            'onlineVideo' => [
                'required',
                'url',
                new YoutubeOrGoogleDriveVideo
            ]
        ]);


        $this->precom->video()->save(new IptbmPrecomTechVideo([
            'type' => 'online',
            'description' => $this->description,
            'url' => $this->onlineVideo
        ]));
        $this->emit('reloadPage');
    }
    public function rules()
    {
        return [
            'localVideo' => 'required|mimes:mp4,avi,mov|max:20000',
            'onlineVideo' => 'required',
            'description' => 'required|max:100|unique:iptbm_precom_tech_videos,description'
        ];
    }
    public function updated($props)
    {
        $this->validateOnly($props);
    }
    public function mount($precom): void
    {
        $this->precom=$precom;
    }
    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.abh.component.precom.abh-tech-video');
    }
}
