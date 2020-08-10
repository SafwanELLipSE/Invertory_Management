<?php

namespace App\Http\Controllers;

use App\Product;
use App\Brand;
use App\Category;
use App\Supplier;
use App\Employee;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $getProductCount = Product::count();
        $getBrandCount = Brand::count();
        $getCategoryCount = Category::count();
        $getSupplierCount = Supplier::count();
        $getEmployeeCount = Employee::count();
        $getUserCount = User::count();

        return view('home',[
            'getProductCount' => $getProductCount,
            'getBrandCount' => $getBrandCount,
            'getCategoryCount' => $getCategoryCount,
            'getSupplierCount' => $getSupplierCount,
            'getEmployeeCount' => $getEmployeeCount,
            'getUserCount' => $getUserCount,
        ]);
    }
}
