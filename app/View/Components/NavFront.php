<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavFront extends Component
{
    /**
     * Create a new component instance.
     */
    public $items;
    
    public function __construct()
    {
        $this->items=config('nav-front');
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.nav-front');
    }
}
