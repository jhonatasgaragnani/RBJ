<?php

namespace Admin\Composers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminComposer {
    function __construct()
    {

    }

    public function compose(View $view) {
        $view->with('auth', Auth::user());
    }
}