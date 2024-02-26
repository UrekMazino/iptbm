<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use Storage;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class IptbmFileViewer extends Component
{

    public $file_type;
    public $return_path;
    public $file;

    public function mount(Request $request): void
    {
        $this->file_type=$request->query('type');
        $this->file=$request->query('file');
        $this->return_path=$request->query('home');

        if (!$this->file_type || !$this->file || !$this->return_path ) {
            throw new NotFoundHttpException(); // Return a 404 response
        }
        if($this->file_type!=='online')
        {
            $filePath = urldecode($this->file);
            if (!Storage::exists($filePath)) {
                throw new NotFoundHttpException(); // Return a 404 response
            }
        }

    }
    public function render()
    {
        return view('livewire.iptbm-file-viewer')
            ->extends('layouts.iptbm.staff')
            ->section('content');
    }
}
