<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Post;

class PostCard extends Component
{
    public Post $post;
    public string $type;

    public function __construct(Post $post, string $type = 'default')
    {
        $this->post = $post;
        $this->type = $type;
    }

    public function render()
    {
        return view('components.post-card');
    }
}
