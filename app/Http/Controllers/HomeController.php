<?php

namespace App\Http\Controllers;

use App\Type;

class HomeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('home')
            ->with('types', $types);
    }
}
