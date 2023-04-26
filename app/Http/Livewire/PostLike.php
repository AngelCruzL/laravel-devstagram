<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PostLike extends Component
{
  public $post;

  public function render()
  {
    return view('livewire.post-like');
  }
}
