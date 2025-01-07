<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;

class AdminController extends Controller
{

    public function category() {
        $data = category::all();

        return view('admin.category', compact('data'));
    }
    
    public function add_category(Request $request) {
        $data = new Category();

        $data->category_name = $request->categoryName;

        $data->save();

        return redirect()->back()->with('msg', 'Categoria adicionada com sucesso.');
    }

    public function delete_category($id) {
        $data = category::find($id);
        $data->delete();

        return redirect()->back()->with('msg', 'Categoria deletada com sucesso.');
    }

    public function view_product() {
        $data = product::all();

        return view('admin.view_product', compact('data'));
    }

    public function add_product_page() {
        $category = category::all();

        return view('admin.add_product', compact('category'));
    }

    public function add_product(Request $request) {
        $product = new product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discount;
        $product->category = $request->category;

        $image = $request->image;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('product', $imageName);
        $product->image = $imageName;

        $product->save();

        return redirect()->back()->with('msg', 'Produto adicionado com sucesso!');
    }

    public function delete_product($id) {
        $data = product::find($id);
        $data->delete();

        return redirect()->back()->with('msg', 'Produto deletado com sucesso.');
    }

    public function edit_product($id) {
        $product = product::find($id);
        $category = category::all();

        return view('admin.update_product', compact('product', 'category'));
    }

    public function edit_product_confirm(Request $request, $id) {
        $product = product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discount;
        $product->category = $request->category;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('product'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect()->route('view_product')->with('msg', 'Produto editado com sucesso!');
    }
}
