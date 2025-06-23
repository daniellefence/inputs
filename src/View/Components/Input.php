<?php

namespace DanielleFence\Notes\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $variant;
    public function __construct($variant='text') {
        $this->variant = $variant;
    }
    public function render()
    {
        return view('df::components.input');
    }
}
