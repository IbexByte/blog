<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Textarea extends Component
{
    public ?string $name;
    public string $placeholder;
    public int $rows;
    public string $class;

    public function __construct(string $name = null, string $placeholder = '', int $rows = 3, string $class = 'w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500')
    {
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->rows = $rows;
        $this->class = $class;
    }

    public function render()
    {
        return view('components.textarea');
    }
}
