<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoPath extends Controller
{
    function goOrder(){
        return view('dashboard/order');
    }

    function goKitchen(){
        return view('dashboard/kitchen');
    }

    function goFinance(){
        return view('dashboard/finance');
    }
}
