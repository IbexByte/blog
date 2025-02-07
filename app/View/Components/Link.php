<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Link extends Component
{
    public string $href;
    public string $target;
    public string $class;
    public bool $external;

    public function __construct(string $href, string $class = '', bool $external = false)
    {
        $this->href = $href;
        $this->external = $external;
        $this->target = $external ? '_blank' : '_self';
        $this->class = $class ?: 'text-blue-600 hover:underline hover:text-blue-800 transition';
    }

    public function render()
    {
        return view('components.link');
    }
}
