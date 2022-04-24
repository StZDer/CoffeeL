<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function all()
    {
        $products = Product::orderBy('updated_at')->get();
        return view('home', ['products' => $products]);
    }
    public function index(Request $request)
    {
        $products = Product::orderBy('updated_at', 'desc')->where('in_stock', '1')->get();

        if (isset($request->orderBy)) {
            if ($request->orderBy == "prise-high-low") {
                $products = Product::where('in_stock', '1')->orderBy('price')->get();
            }
        };

        if (isset($request->orderBy)) {
            if ($request->orderBy == "prise-low-high") {
                $products = Product::where('in_stock', '1')->orderBy('price', 'desc')->get();
            }
        };

        if (isset($request->orderBy)) {
            if ($request->orderBy == "name-a-z") {
                $products = Product::where('in_stock', '1')->orderBy('title')->get();
            }
        };

        if (isset($request->orderBy)) {
            if ($request->orderBy == "name-z-a") {
                $products = Product::where('in_stock', '1')->orderBy('title', 'desc')->get();
            }
        };

        if ($request->ajax()) {
            return view('ajax.orderBy', ['products' => $products])->render();
        }
        return view('home', ['products' => $products]);
    }
    public function instock($id)
    {
        $products = Product::find($id);
        DB::table('products')
            ->where('id', $id)
            ->update(['in_stock' => 1]);

        $products->save();

        return redirect()->route('home', $id)->with('success', 'Товар в наличии');
    }
    public function showCategory(Request $request, $cat_alias)
    {
        $category = Category::where('alias', $cat_alias)->first();
        $products = Product::where('category_id', $category->id)->where('in_stock', '1')->get();

        if (isset($request->orderBy)) {
            if ($request->orderBy == "prise-high-low") {
                $products = Product::where('category_id', $category->id)->where('in_stock', '1')->orderBy('price')->get();
            }
        };

        if (isset($request->orderBy)) {
            if ($request->orderBy == "prise-low-high") {
                $products = Product::where('category_id', $category->id)->where('in_stock', '1')->orderBy('price', 'desc')->get();
            }
        };

        if (isset($request->orderBy)) {
            if ($request->orderBy == "name-a-z") {
                $products = Product::where('category_id', $category->id)->where('in_stock', '1')->orderBy('title')->get();
            }
        };

        if (isset($request->orderBy)) {
            if ($request->orderBy == "name-z-a") {
                $products = Product::where('category_id', $category->id)->where('in_stock', '1')->orderBy('title', 'desc')->get();
            }
        };

        if ($request->ajax()) {
            return view('ajax.orderBy', ['products' => $products])->render();
        }
        return view('category', ['category' => $category, 'products' => $products]);
    }
}
