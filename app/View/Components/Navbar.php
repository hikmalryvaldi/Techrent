<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */

    public $isRegistrationPage;
    public $isProdukPage;

    public function __construct($isRegistrationPage = false, $isProdukPage = false)
    {
        $this->isRegistrationPage = $isRegistrationPage;
        $this->isProdukPage = $isProdukPage;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar');
        
    }
}
