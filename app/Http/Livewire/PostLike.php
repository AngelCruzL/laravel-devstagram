<?php

namespace App\Http\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class PostLike extends Component
{
  public $post;
  public bool $is_liked;
  public int $likes_count;

  public function mount($post): void
  {
    $this->is_liked = $post->check_like(auth()->user());
    $this->likes_count = $post->likes->count();
  }

  public function render(): View
  {
    return view('livewire.post-like');
  }

  public function like(): void
  {
    if ($this->post->check_like(auth()->user())) {
      $this->post->likes()->where('post_id', $this->post->id)->delete();
      $this->is_liked = false;
      $this->likes_count--;
    } else {
      $this->post->likes()->create([
        'user_id' => auth()->user()->id,
      ]);
      $this->is_liked = true;
      $this->likes_count++;
    }
  }
}
