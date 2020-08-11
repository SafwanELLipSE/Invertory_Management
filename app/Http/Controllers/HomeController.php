<?php

namespace App\Http\Controllers;

use App\Product;
use App\Brand;
use App\Category;
use App\Supplier;
use App\Employee;
use App\User;
use App\Order;
use Illuminate\Support\Facades\Auth;
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

        if(Auth::user()->isMasterAdmin())
        {
          $today = Order::whereDate('created_at', '=',date('Y-m-d'))->count();
          $yesterday = Order::whereDate('created_at', '=', date('Y-m-d',strtotime('-1 days')) )->count();
          $lastWeek = Order::whereDate('created_at', '>', date('Y-m-d',strtotime('-7 days')) )->count();
          $lastMonth = Order::whereDate('created_at', '>', date('Y-m-d',strtotime('-30 days')) )->count();
          $lastYear = Order::whereDate('created_at', '>', date('Y-m-d',strtotime('-365 days')) )->count();
        }
        if(Auth::user()->isEmployee())
        {
            $today = Order::where('created_by',Auth::user()->id)->whereDate('created_at', '=',date('Y-m-d'))->count();
            $yesterday = Order::where('created_by',Auth::user()->id)->whereDate('created_at', '=', date('Y-m-d',strtotime('-1 days')) )->count();
            $lastWeek = Order::where('created_by',Auth::user()->id)->whereDate('created_at', '>', date('Y-m-d',strtotime('-7 days')) )->count();
            $lastMonth = Order::where('created_by',Auth::user()->id)->whereDate('created_at', '>', date('Y-m-d',strtotime('-30 days')) )->count();
            $lastYear = Order::where('created_by',Auth::user()->id)->whereDate('created_at', '>', date('Y-m-d',strtotime('-365 days')) )->count();
        }

        return view('home',[
            'getProductCount' => $getProductCount,
            'getBrandCount' => $getBrandCount,
            'getCategoryCount' => $getCategoryCount,
            'getSupplierCount' => $getSupplierCount,
            'getEmployeeCount' => $getEmployeeCount,
            'getUserCount' => $getUserCount,
            'today' => $today,
            'yesterday' => $yesterday,
            'lastWeek' => $lastWeek,
            'lastYear' => $lastYear,
        ]);
    }
}
