<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function SearchProduct(Request $request)
    {
        if ($request->search) {
            $searchProducts = Product::where('product_name', 'like', '%' . $request->search . '%')->latest()->paginate(15);
            return view('user_template.search', compact('searchProducts'));
        } else {
            return redirect()->back()->with('message', 'Empty Search');
        }
    }
    //
}
