<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

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
}
