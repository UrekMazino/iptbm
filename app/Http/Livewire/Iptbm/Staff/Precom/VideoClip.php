<?php

namespace App\Http\Livewire\Iptbm\Staff\Precom;

use App\Models\iptbm\IptbmPrecomTechVideo;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;


class VideoClip extends Component
{
    use WithFileUploads;

    public $precom;
    public $thumbnail;
    public $localVideo;
    public $description;
    public $onlineVideo;

    public $videoPlaying;


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
            'onlineVideo' => 'required|url'
        ]);


        $this->precom->video()->save(new IptbmPrecomTechVideo([
            'type' => 'online',
            'description' => $this->description,
            'url' => $this->onlineVideo
        ]));
        $this->emit('reloadPage');
    }


//<iframe src="https://drive.google.com/file/d/13dbIq0z1IN617ZAW3cK3KagPjTtZEHll/preview" width="640" height="480" allow="autoplay"></iframe>

    public function deleteVideo($video)
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

    public function rules()
    {
        return [
            'localVideo' => 'required|mimes:mp4,avi,mov|max:20000',
            'onlineVideo' => 'required',
            'description' => 'required|max:50|unique:iptbm_precom_tech_videos,description'
        ];
    }


    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function mount($precom)
    {
        $this->precom = $precom;
        $this->videoPlaying = $this->precom->video()->latest()->first();

    }

    public function render()
    {
        return view('livewire.iptbm.staff.precom.video-clip');
    }
}
