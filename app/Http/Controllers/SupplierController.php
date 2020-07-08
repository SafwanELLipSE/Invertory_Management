<?php

namespace App\Http\Controllers;
use App\Supplier;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
  public function createSupplier(Request $request)
  {
      return view("suppliers.create_supplier");
  }
  public function saveCreatedSupplier(Request $request)
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
            'type' => 'required',
            'payment_method' => 'required',
         ]);

        if ($validator->fails()){
            alert()->warning('Error occured',$validator->errors()->all()[0]);
            return redirect()->back()->withInput()->withErrors($validator);
          }


          $supplier = new Supplier();
          $supplier->name = $request->post('name');
          $supplier->email = $request->post('email');
          $supplier->mobile_no = $request->post('mobile');
          $supplier->gender = $request->post('gender');

          if($request->photo)
          {
            $image = $request->file('photo');
            $new_name = Auth::user()->id . '_' . self::uniqueString() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('supplier_image'), $new_name);
            $supplier->photo = $new_name;
          }

          $supplier->nid_number = $request->post('nid');
          $supplier->address = $request->post('address');
          $supplier->city = $request->post('city');
          $supplier->shop_name = $request->post('shop_name');
          $supplier->type = $request->post('type');
          $supplier->payment_method = $request->post('payment_method');
          $supplier->bank_name = $request->post('bank_name');
          $supplier->bank_branch = $request->post('bank_branch');
          $supplier->account_name = $request->post('account_name');
          $supplier->account_number = $request->post('account_number');
          $supplier->created_by = Auth::user()->id;
          $supplier->save();

          Alert::success('Success', 'Successfully Created a new Supplier');
          return redirect()->route('supplier.create');
  }
  public function getSupplierList(Request $request)
  {
      $suppliers = Supplier::get();
      return view("suppliers.supplier_list",[
        'suppliers' => $suppliers,
      ]);
  }
  public function detailSupplier(Request $request, $id)
  {
        return view('suppliers.detail_supplier',[
          'supplier' => Supplier::find($id),
        ]);
  }

  public function deleteSupplier(Request $request)
  {
      $supplier_id = $request->post('supplier_id');

      $get_supplier = Supplier::where('id',$supplier_id)->first();
      $image_link = $get_supplier->photo;
      if($image_link != null)
      {
        $path_image = public_path().'/supplier_image/'. $image_link;
        unlink($path_image);
      }
      $delete_supplier = Supplier::where('id',$supplier_id)->delete();

      Alert::success('Success', 'Successfully Removed');
      return redirect()->route('supplier.all_suppliers');
  }

  public function editSupplier(Request $request, $id)
  {
    return view('suppliers.supplier_edit',[
      'supplier' => Supplier::find($id),
    ]);
  }
  public function updateSupplier(Request $request)
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
          'type' => 'required',
          'payment_method' => 'required',
       ]);


      if ($validator->fails()){
          alert()->warning('Error occured',$validator->errors()->all()[0]);
          return redirect()->back()->withInput()->withErrors($validator);
        }


      $supplierId = $request->post('supplier_id');

      $get_supplier = Supplier::where('id',$supplierId)->first();

      $supplier = Supplier::find($supplierId);
      $supplier->name = $request->post('name');
      $supplier->email = $request->post('email');
      $supplier->mobile_no = $request->post('mobile');
      $supplier->gender = $request->post('gender');

      $supplier->nid_number = $request->post('nid');
      $supplier->address = $request->post('address');
      $supplier->city = $request->post('city');
      $supplier->shop_name = $request->post('shop_name');
      $supplier->type = $request->post('type');
      $supplier->payment_method = $request->post('payment_method');
      if($request->photo)
      {
        $image_link = $get_supplier->photo;
        $path_image = public_path().'/supplier_image/'. $image_link;
        unlink($path_image);
      }
      if($request->photo)
      {
            $image = $request->file('photo');
            $new_name = Auth::user()->id . '_' . self::uniqueString() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('supplier_image'), $new_name);
            $supplier->photo = $new_name;
      }
      $supplier->bank_name = $request->post('bank_name');
      $supplier->bank_branch = $request->post('bank_branch');
      $supplier->account_name = $request->post('account_name');
      $supplier->account_number = $request->post('account_number');
      $supplier->save();

      Alert::success('Success', 'Successfully Updated');
      return redirect()->route('supplier.edit', $supplierId);
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
