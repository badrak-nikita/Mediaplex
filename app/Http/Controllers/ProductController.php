<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function view_products()
    {
        $product = Product::all();
        return view('admin.product', compact('product'));
    }

    public function add_products()
    {
        $category = Category::all();
        return view('admin.add_products', compact('category'));
    }

    public function products_add(Request $request)
    {
        $product = new Product;
        $product->product_name=$request->product_name;
        $product->description=$request->description;
        $product->category=$request->category;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;
        
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product->image = $imagename;

        $product->save();
        return redirect()->back();
    }

    public function delete_products($id)
    {
        $data = Product::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Товар видалений');
    }

    public function update_products($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        return view('admin.update_products', compact('product', 'category'));
    }

    public function update_products_confirm(Request $request, $id)
    {
        if(Auth::id())
        {
            $product = Product::find($id);

            $product->product_name=$request->product_name;
            $product->description=$request->description;
            $product->category=$request->category;
            $product->price=$request->price;
            $product->discount_price=$request->discount_price;
    
            $image = $request->image;
            if($image)
            {
                $imagename = time().'.'.$image->getClientOriginalExtension();
                $request->image->move('product', $imagename);
                $product->image = $imagename;
            }
            
            $product->save();
            return redirect()->back()->with('message', 'Товар редаговано');
        }
        else
        {
            return redirect('auth/login');
        }
    }
}