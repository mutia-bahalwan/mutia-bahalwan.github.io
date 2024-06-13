<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function beranda(){
        return view("beranda");
    }
    public function admin_dashboard(){
        return view("admin.admin_dashboard");
    }

    public function admin_product(){
        return view("admin.admin_product");
    }
    
    public function admin_order(){
        return view("admin.admin_order");
    }
}
