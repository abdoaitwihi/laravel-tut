<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuItemController;




class HomeController extends Controller
{
    public function show(){
        $menuItems  = new MenuItemController();
        $data = $menuItems->getAll();
        return view('home' , ['menuItems' => $data]);  
    }
}
