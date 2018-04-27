<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\About;
use Intervention\Image\ImageManagerStatic as Image;

class AboutController extends Controller
{
    public function edit()
    {
        $about = About::findOrFail(1);
        return view('admin.about.edit')
            ->with('about', $about);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'owner_name' => 'required',
            'shop_name' => 'required',
            'description' => '',
            'phone' => 'required',
            'email' => 'email',
            'address' => 'required',
            'gmap' => '',
            'fax' => '',
            'hours' => 'required',
            'photo' => 'image|mimes:jpeg,bmp,png|max:2000',
            'banner' => 'image|mimes:jpeg,bmp,png|max:2000',
        ]);
        $data = $request->all();

        if (isset($request['photo'])) {
            $photo = $request->photo;
            Image::make($photo)->orientate()->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save('upload/shop.jpg');
        }
        if (isset($request['banner'])) {
            $photo = $request->banner;
            Image::make($photo)->orientate()->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save('upload/banner.jpg');
        }
        if (strpos($data['gmap'], '<iframe') !== false) {
            $data['gmap'] = str_replace('<iframe src="', '', $data['gmap']);
            $pos = strpos($data['gmap'], '"');
            $data['gmap'] = substr($data['gmap'], 0, $pos);
        }

        $about = About::findOrFail(1);
        $about->update($data);

        session()->flash('msg', 'Successfully Updated!');
        return redirect()->route('adminAboutEdit');
    }
}
