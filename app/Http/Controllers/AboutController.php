<?php

namespace App\Http\Controllers;

use App\About;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::findOrFail(1);
        return view('about')
            ->with('about', $about);
    }
}
