<?php

namespace App\Http\Controllers;

use App\Models\Chackout;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function view_order()
    {
        $chackout = Chackout::all();
        return view('admin.orders', compact('chackout'));
    }

    public function delivered($id)
    {
        $chackout = Chackout::find($id);
        $chackout->delivery_status = "Доставлено";
        $chackout->payment_status = "Оплачено";
        $chackout->save();

        return redirect()->back();
    }
}