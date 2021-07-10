<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GameCardSmall extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $most;
    public function __construct($most)
    {
        $this->most = $most;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.game-card-small');
    }
}
