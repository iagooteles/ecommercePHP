<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class AdminController extends Controller
{
    public function category() {
        return view('admin.category');
    }
    
    public function add_category(Request $request) {
        $data = new Category();

        $data->category_name = $request->categoryName;

        $data->save();

        return redirect()->back()->with('msg', 'Categoria adicionada com sucesso.');
    }
}
