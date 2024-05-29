<?php

namespace App\Http\Controllers;

use App\Models\Pass;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PassController extends Controller
{
    public function view_pass()
    {
        $pass = Pass::all();
        return view('admin.pass', compact('pass'));
    }

    public function add_pass()
    {
        $category = Category::all();
        return view('admin.add_pass', compact('category'));
    }

    public function pass_add(Request $request)
    {
        $pass = new Pass;
        $pass->pass_name=$request->pass_name;
        $pass->category=$request->category;
        $pass->price=$request->price;
        $pass->duration=$request->duration;
        $pass->type=$request->type;
        $pass->save();
        return redirect()->back();
    }

    public function pass_delete($id)
    {
        $data = Pass::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Пiдписка видалена');
    }
    public function update_pass($id)
    {
        $pass = Pass::find($id);
        $category = Category::all();
        return view('admin.update_pass', compact('pass', 'category'));
    }

    public function update_pass_confirm(Request $request, $id)
    {
        if(Auth::id())
        {
            $pass = Pass::find($id);

            $pass->pass_name=$request->pass_name;
            $pass->category=$request->category;
            $pass->price=$request->price;
            $pass->duration=$request->duration;
            $pass->type=$request->type;
            
            $pass->save();
            return redirect()->back()->with('message', 'Пiдписку редаговано');
        }
        else
        {
            return redirect('auth/login');
        }
    }
}