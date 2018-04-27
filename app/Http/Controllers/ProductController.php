<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index($id)
    {
        $product = Product::findOrFail($id);
        return view('products.productsDetail')
            ->with('product', $product);
    }

    public function getMakes($id) {
        $makes = DB::table("makes")->where("type_id", $id)->pluck("name","id");

        return json_encode($makes);

    }
}
