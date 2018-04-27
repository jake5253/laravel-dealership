<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Type;
use App\Make;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use App\ProductImage;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index')->with('products', $products);
    }

    public function create()
    {
        $types = Type::pluck("name", "id");

        return view('admin.products.create')
            ->with('types', $types);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required',
            'mileage' => 'required|numeric',
            'color' => 'required',
            'year' => 'required|numeric',
            'transmission' => 'required',
            'fuel_type' => 'required',
            'price' => 'required|numeric',
            'type' => 'required|numeric|exists:types,id',
            'make_id' => 'required|numeric|exists:makes,id',
            'photo' => 'required',
            'photo.*' => 'image|mimes:jpeg,bmp,png|max:2000',

        ]);
        $data = $request->all();

        $product = Product::create($data);
        $default = 1;
        foreach ($request->photo as $photo) {
            $filename = mt_rand();
            Image::make($photo)->orientate()->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save('upload/thm_' . $filename . '.jpg');
            Image::make($photo)->orientate()->resize(null, 800, function ($constraint) {
                $constraint->aspectRatio();
            })->save('upload/' . $filename . '.jpg');

            ProductImage::create([
                'product_id' => $product->id,
                'image' => 'upload/' . $filename . '.jpg',
                'thumbnail' => 'upload/thm_' . $filename . '.jpg',
                'default' => $default
            ]);
            $default = null;
        }

        session()->flash('msg', 'Successfully Listed!');
        return redirect()->route('admin');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $types = Type::pluck('name', 'id');
        $makes = Make::pluck('name', 'id');
        return view('admin.products.edit')
            ->with('product', $product)
            ->with('types', $types)
            ->with('makes', $makes);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required',
            'mileage' => 'required|numeric',
            'color' => 'required',
            'year' => 'required|numeric',
            'transmission' => 'required',
            'fuel_type' => 'required',
            'price' => 'required|numeric',
            'make_id' => 'numeric|exists:makes,id',
            'photo[]' => 'image|mimes:jpeg,bmp,png|max:2000'
        ]);
        $data = $request->all();

        $product = Product::findOrFail($id);
        $product->update($data);
        if ($request->photo) {
            foreach ($request->photo as $photo) {
                $filename = mt_rand();
                Image::make($photo)->orientate()->resize(null, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('upload/thm_' . $filename . '.jpg');
                Image::make($photo)->orientate()->save('upload/' . $filename . '.jpg');

                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => 'upload/' . $filename . '.jpg',
                    'thumbnail' => 'upload/thm_' . $filename . '.jpg',
                ]);
            }
        }
        session()->flash('msg', 'Successfully Updated Listing!');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        session()->flash('msg', 'Successfully Deleted!');
        return redirect()->back();
    }
}
