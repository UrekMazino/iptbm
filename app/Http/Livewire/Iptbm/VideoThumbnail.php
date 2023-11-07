<?php

namespace App\Http\Livewire\Iptbm;



use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class VideoThumbnail extends Component
{

    public function generateThumbnail($video)
    {

        $outputPath = 'public/storage/thumbnails/'.$video;
        $storage=Storage::disk('public/storage');
        FFMpeg::fromDisk($storage)
            ->open($video)
            ->getFrameFromSeconds(10)
            ->export()
            ->toDisk('public')
            ->save($outputPath);

        session()->flash('message', 'Thumbnail generated successfully');
    }
    public function render()
    {
        return view('livewire.iptbm.video-thumbnail');
    }
}
