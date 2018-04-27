<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Make;
use App\Type;
use Input;

class MakeController extends Controller
{
    public function index()
    {
        $makes = Make::paginate(10);
        return view('admin.makes.index')->with('makes', $makes);
    }

    public function create()
    {
        $types = Type::pluck('name', 'id');
        return view('admin.makes.create')->with('types', $types);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|min:3',
            'type_id' => 'required|numeric|exists:types,id'
        ]);
        Make::create(Input::all());
        return redirect()->route('adminMakes');
    }

    public function edit($id)
    {

        $make = Make::findOrFail($id);
        $types = Type::pluck('name', 'id');
        return view('admin.makes.edit')->with('make', $make)->with('types', $types);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255|min:3',
            'type_id' => 'required|numeric|exists:types,id'
        ]);
        $make = Make::findOrFail($id);
        $make->update(Input::all());
        return redirect()->route('adminMakes');
    }

    public function destroy($id)
    {
        Make::destroy($id);
        return redirect()->route('adminMakes');
    }
}
