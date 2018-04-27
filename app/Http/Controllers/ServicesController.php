<?php

namespace App\Http\Controllers;

use App\Services;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Services::all();
        return view('services')
            ->with('services', $services);
    }
}
