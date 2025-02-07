<?php
namespace App\View\Components;

use Illuminate\View\Component;

class UserAvatar extends Component
{
    public $user;
    public $size;

    public function __construct($user, $size = '12')
    {
        $this->user = $user;
        $this->size = $size;
    }

    public function initials()
    {
        if (!$this->user || !$this->user->name) {
            return '👤'; // أيقونة افتراضية إذا لم يكن هناك اسم
        }

        $names = explode(' ', trim($this->user->name));
        $initials = strtoupper(mb_substr($names[0] ?? '', 0, 1)) . strtoupper(mb_substr($names[1] ?? '', 0, 1));

        return $initials;
    }

    public function render()
    {
        return view('components.user-avatar');
    }
}
