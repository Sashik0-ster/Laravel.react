<?php

namespace App\View\Components\Sidebars;

use App\View\Components\Sidebars\SidebarData;

// Імпортуємо трейт
use Illuminate\View\Component;

class SidebarMobileComponent extends Component
{
    use SidebarData;

    public function __construct()
    {
        $this->getMenuItems();
    }

    public function render()
    {
        return view('components.sidebars.sidebar-mobile-component');
    }
}
