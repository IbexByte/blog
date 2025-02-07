<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public string $type;
    public string $icon;
    public string $class;

    public function __construct(string $type = 'info', string $icon = '', string $class = '')
    {
        $this->type = $type;
        $this->icon = $icon ?: $this->getDefaultIcon($type);
        $this->class = $class ?: $this->getDefaultClass($type);
    }

    private function getDefaultIcon($type)
    {
        return match ($type) {
            'success' => '✅',
            'error' => '❌',
            'warning' => '⚠️',
            'info' => 'ℹ️',
            default => 'ℹ️',
        };
    }

    private function getDefaultClass($type)
    {
        return match ($type) {
            'success' => 'bg-green-100 text-green-800 border-green-300',
            'error' => 'bg-red-100 text-red-800 border-red-300',
            'warning' => 'bg-yellow-100 text-yellow-800 border-yellow-300',
            'info' => 'bg-blue-100 text-blue-800 border-blue-300',
            default => 'bg-gray-100 text-gray-800 border-gray-300',
        };
    }

    public function render()
    {
        return view('components.alert');
    }
}
