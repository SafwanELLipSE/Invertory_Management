<?php

namespace App\Http\Controllers;

use App\Charts\orderChart;
use App\Product;
use App\Brand;
use App\Category;
use App\Supplier;
use App\Employee;
use App\User;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
          $lastYear = Order::whereDate('created_at', '>', date('Y-m-d',strtotime('-365 days')) )->count();

          $date = new Carbon;
          $chart = new OrderChart;
          $times = array();
          $hours = array();
          $count = 0;
          for($i=0; $i<=24;$i++){
              $times[] = $count;
              $hours[] = Order::whereDate('created_at', '=',date('Y-m-d'))->where('created_at', '>=', $date->subHours($count))->count();
              $count++;
          }

          $total_times = implode(",",$times);

          $chart->labels(['0','4','8','12','16','20','24']);
          $chart->dataset('Today\'s Order','line',$hours)
          ->backgroundColor('rgba(112, 195, 250, 0.93)')->color('rgba(16, 20, 148, 1)');

        }
        if(Auth::user()->isEmployee())
        {
            $today = Order::where('created_by',Auth::user()->id)->whereDate('created_at', '=',date('Y-m-d'))->count();
            $yesterday = Order::where('created_by',Auth::user()->id)->whereDate('created_at', '=', date('Y-m-d',strtotime('-1 days')) )->count();
            $lastWeek = Order::where('created_by',Auth::user()->id)->whereDate('created_at', '>', date('Y-m-d',strtotime('-7 days')) )->count();
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
            'chart' => $chart,
        ]);
    }
}
