<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsAddController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('admin');
    // }

    public function submit(ProductRequest $red) // добавление записи
    {
        $products = new Product();
        $products->title = $red->input('title');
        $products->price = $red->input('price');
        $products->description = $red->input('description');
        $products->in_stock = $red->input('in_stock');
        $products->category_id = $red->input('category_id');
        $products->composition1 = $red->input('composition1');
        $products->composition2 = $red->input('composition2');
        $products->composition3 = $red->input('composition3');
        $products->composition4 = $red->input('composition4');

        $products->save();
        return redirect()->route('products')->with('success', 'Продукт был добавлено');
    }

    public function edit($id)
    {
        $products = new Product();
        return view('Products.products-edit', ['data' => $products->find($id)]);
    }

    public function update($id, ProductRequest $red) // редактирование записи
    {
        $products = Product::find($id);
        $products->title = $red->input('title');
        $products->price = $red->input('price');
        $products->description = $red->input('description');
        $products->in_stock = $red->input('in_stock');
        $products->category_id = $red->input('category_id');
        $products->composition1 = $red->input('composition1');
        $products->composition2 = $red->input('composition2');
        $products->composition3 = $red->input('composition3');
        $products->composition4 = $red->input('composition4');

        $products->save();

        return redirect()->route('home')->with('success', 'Сообщение было изменено');
    }
    public function index()
    {
        return view('Products.products-add');
    }
    public function delete($id) // Удаление записи
    {
        Product::find($id)->delete();
        return redirect()->route('home')->with('delete', 'Сообщение было удаленно');
    }
    public function more($id)
    {
        $products = Product::find($id); // выпечка
        return view('Products.products-more', ['products' => $products]);
    }
}
