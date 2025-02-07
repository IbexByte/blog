<?php

namespace App\View\Components;
 
use Illuminate\View\Component;

class Button extends Component
{
    public $type;
    public $class;

    public function __construct($type = 'button', $class = 'bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded')
    {
        $this->type = $type;
        $this->class = $class;
    }

    public function render()
    {
        return view('components.button');
    }
}
