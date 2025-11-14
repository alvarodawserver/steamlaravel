<?php


namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component{
    public function render():View|Closure|String
        {
            return view('layouts.app');
        }
}
