<?php
// app/View/Components/SocialShareButton.php
namespace App\View\Components;

use Illuminate\View\Component;

class SocialShareButton extends Component
{
    public $platform;
    public $url;
    public $color;
    public $icon;

    public function __construct($platform, $url, $color = 'blue', $icon = '📢')
    {
        $this->platform = $platform;
        $this->url = $url;
        $this->color = $color;
        $this->icon = $icon;
    }

    public function shareUrl()
    {
        return match($this->platform) {
            'twitter' => "https://twitter.com/share?url={$this->url}",
            'facebook' => "https://www.facebook.com/sharer/sharer.php?u={$this->url}",
            'linkedin' => "https://www.linkedin.com/shareArticle?mini=true&url={$this->url}",
            default => '#'
        };
    }

    public function render()
    {
        return view('components.social-share-button');
    }
}