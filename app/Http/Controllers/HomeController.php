<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\SaleOrder;

class HomeController extends Controller
{
    public function home(){
        return view("allpages.home");
    }

    public function aboutpage(){
        return view("allpages.about");
    }

    public function contactuspage(){
        return view("allpages.contactus");
    }

    public function category(){
        dd(Category::all());
    }

    public function product(){
        dd(Product::all());
    }

    public function saleorder(){
        dd(SaleOrder::all());
    }
}
