<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services;

class ServiceController extends Controller
{
    public function edit()
    {
        $services = Services::all();
        return view('admin.services.edit')
            ->with('services', $services);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $data = $request->all();
        Services::create($data);
        session()->flash('msg', 'Service Added');

        return redirect()->route('adminServicesEdit');
    }

    public function destroy($id)
    {
        $service = Services::findOrFail($id);
        $service->delete();

        session()->flash('msg', 'Service Removed');

        return redirect()->route('adminServicesEdit');
    }
}
