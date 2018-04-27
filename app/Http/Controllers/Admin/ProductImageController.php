<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductImage;

class ProductImageController extends Controller
{
    public function destroy($id)
    {
        $image = ProductImage::findOrFail($id);
        $image->delete();
        return redirect()->route('adminProductsEdit', [$image->product_id]);
    }

    public function setImageDefault(Request $request)
    {
        ProductImage::where(['product_id' => $request->product, 'default' => 1])->update(array('default' => null));
        ProductImage::where('id', $request->id)->update(array('default' => 1));
        return redirect()->route('adminProductsEdit', ['id' => $request->product]);
    }
}
