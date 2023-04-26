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

  public function like()
  {
    if ($this->post->check_like(auth()->user())) {
      $this->post->likes()->where('post_id', $this->post->id)->delete();
    } else {
      $this->post->likes()->create([
        'user_id' => auth()->user()->id,
      ]);
    }
  }
}
