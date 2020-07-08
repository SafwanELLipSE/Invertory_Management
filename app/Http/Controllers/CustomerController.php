<?php

namespace App\Http\Controllers;

use App\Customer;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
  public function createCustomer(Request $request)
  {
      return view("customers.create_customer");
  }
  public function saveCreatedCustomer(Request $request)
  {
      $validator = Validator::make($request->all(), [
            'name'   => 'required|min:3',
            'email'  => 'required|email',
            'mobile' => 'required|min:11|max:13',
            'address'=> 'required|min:3',
            'gender' => 'required',
            'nid' => 'min:10',
            'city' => 'required|min:3',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'shop_name' => 'required|min:4',
            'payment_method' => 'required',
         ]);

        if ($validator->fails()){
            alert()->warning('Error occured',$validator->errors()->all()[0]);
            return redirect()->back()->withInput()->withErrors($validator);
          }


          $customer = new Customer();
          $customer->name = $request->post('name');
          $customer->email = $request->post('email');
          $customer->mobile_no = $request->post('mobile');
          $customer->gender = $request->post('gender');
          if($request->photo)
          {
            $image = $request->file('photo');
            $new_name = Auth::user()->id . '_' . self::uniqueString() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('customer_image'), $new_name);
            $customer->photo = $new_name;
          }

          $customer->nid_number = $request->post('nid');
          $customer->address = $request->post('address');
          $customer->city = $request->post('city');
          $customer->shop_name = $request->post('shop_name');
          $customer->payment_method = $request->post('payment_method');
          $customer->bank_name = $request->post('bank_name');
          $customer->bank_branch = $request->post('bank_branch');
          $customer->account_name = $request->post('account_name');
          $customer->account_number = $request->post('account_number');
          $customer->created_by = Auth::user()->id;
          $customer->save();

          Alert::success('Success', 'Successfully Created a new Customer');
          return redirect()->route('customer.create');
  }
  public function getCustomerList(Request $request)
  {
      $customers = Customer::get();
      return view("customers.customer_list",[
        'customers' => $customers,
      ]);
  }

  public function detailCustomer(Request $request, $id)
  {;
        return view('customers.detail_customer',[
          'customer' => Customer::find($id),
        ]);
  }

  public function deleteCustomer(Request $request)
  {
      $customer_id = $request->post('customer_id');

      $get_customer = Customer::where('id',$customer_id)->first();
      $image_link = $get_customer->photo;
      if($image_link != null)
      {
        $path_image = public_path().'/customer_image/'. $image_link;
        unlink($path_image);
      }
      $delete_customer = Customer::where('id',$customer_id)->delete();

      Alert::success('Success', 'Successfully Removed');
      return redirect()->route('customer.all_customers');
  }

  public function editCustomer(Request $request, $id)
  {
    return view('customers.customer_edit',[
      'customer' => Customer::find($id),
    ]);
  }

  public function updateCustomer(Request $request)
  {
    $validator = Validator::make($request->all(), [
          'name'   => 'required|min:3',
          'email'  => 'required|email',
          'mobile' => 'required|min:11|max:13',
          'address'=> 'required|min:3',
          'gender' => 'required',
          'nid' => 'min:10',
          'city' => 'required|min:3',
          'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          'shop_name' => 'required|min:4',
          'payment_method' => 'required',
       ]);

      if ($validator->fails()){
          alert()->warning('Error occured',$validator->errors()->all()[0]);
          return redirect()->back()->withInput()->withErrors($validator);
        }


      $customerId = $request->post('customer_id');

      $get_customer = Customer::where('id',$customerId)->first();
      $image_link = $get_customer->photo;


      $customer = Customer::find($customerId);
      $customer->name = $request->post('name');
      $customer->email = $request->post('email');
      $customer->mobile_no = $request->post('mobile');
      $customer->gender = $request->post('gender');
      $customer->nid_number = $request->post('nid');
      $customer->address = $request->post('address');
      $customer->city = $request->post('city');
      $customer->shop_name = $request->post('shop_name');
      if($request->photo)
      {
        $path_image = public_path().'/customer_image/'. $image_link;
        unlink($path_image);
      }
      if($request->photo)
      {
            $image = $request->file('photo');
            $new_name = Auth::user()->id . '_' . self::uniqueString() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('customer_image'), $new_name);
            $customer->photo = $new_name;
      }
      $customer->payment_method = $request->post('payment_method');
      $customer->bank_name = $request->post('bank_name');
      $customer->bank_branch = $request->post('bank_branch');
      $customer->account_name = $request->post('account_name');
      $customer->account_number = $request->post('account_number');
      $customer->save();



      Alert::success('Success', 'Successfully Updated');
      return redirect()->route('customer.edit', $customerId);
  }

  private function uniqueString()
  {
      $m = explode(' ', microtime());
      list($totalSeconds, $extraMilliseconds) = array($m[1], (int)round($m[0] * 1000, 3));
      $txID = date('YmdHis', $totalSeconds) . sprintf('%03d', $extraMilliseconds);
      $txID = substr($txID, 2, 15);
      return $txID;
  }
}
