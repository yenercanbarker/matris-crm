<?php

namespace App\Http\Controllers\Site;

class PageController
{
    public function index()
    {
        return view('pages.home');
    }
}
