<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function view_category()
    {
        $category = Category::all();
        return view('admin.category', compact('category'));
    }

    public function add_category()
    {
        return view('admin.add_category');
    }

    public function category_add(Request $request)
    {
        $category = new Category;
        $category->category_name=$request->category_name;
        $category->isPass=$request->isPass;
        $category->save();
        return redirect()->back();
    }

    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Категорiя видалена');
    }
}