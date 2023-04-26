<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostList extends Component
{
  public $posts;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($posts)
  {
    $this->posts = $posts;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return View|Closure|string
   */
  public function render()
  {
    return view('components.post-list');
  }
}
