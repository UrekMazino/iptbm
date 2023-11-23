<?php

namespace App\View\Components\iptbm;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PdfViewer extends Component
{
    /**
     * @var mixed|null
     */
    private mixed $file;
    /**
     * @var mixed|null
     */
    private mixed $modId;

    /**
     * Create a new component instance.
     */
    public function __construct($file = null, $modId = null)
    {
        $this->file = $file;
        $this->modId = $modId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.iptbm.pdf-viewer', [
            'file' => $this->file,
            'modId' => $this->modId
        ]);
    }
}
