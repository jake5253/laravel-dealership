<?php

namespace App\Http\Controllers;

use App\Make;

class MakeController extends Controller
{
    public function index($id)
    {
        $make = make::findOrFail($id);
        return view('makes.show')
            ->with('make', $make);
    }
}
