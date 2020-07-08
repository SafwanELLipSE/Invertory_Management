<?php

namespace App\Http\Controllers;
use App\Employee;
use App\Salary;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use PDF;

class SalaryController extends Controller
{
  public function createSalary(Request $request)
  {
      $employees = Employee::get();
      return view("salaries.create_salary",[
        'employees' => $employees,
      ]);
  }
  public function saveCreatedSalary(Request $request)
  {
    $validator = Validator::make($request->all(), [
          'employee'   => 'required',
          'month'  => 'required',
          'year' => 'required',
          'advance_salary_option'=> 'required',
       ]);

      if($validator->fails()){
        alert()->warning('Error occured',$validator->errors()->all()[0]);
        return redirect()->back()->withInput()->withErrors($validator);
      }

      $employee_id = $request->post('employee');
      $employee =  Employee::where('id',$employee_id)->first();
      $main_salary = $employee->salary;

      //dd($main_salary);

      $month = $request->post('month');
      $year = $request->post('year');
      $advance_salary = $request->post('advance_salary_option');

      $already_advanced = Salary::where('month',$month)->where('employee_id',$employee_id)->where('year',$year)->first();

      if($already_advanced === NULL){

        $pay_salary = new Salary();

        if($advance_salary == 0)
        {
            $pay_salary->employee_id = $employee_id;
            $pay_salary->month = $month;
            $pay_salary->year = $year;
            $pay_salary->status = 0;
            $pay_salary->advanced_salary = $advance_salary; // Option (yes / no);
            $own_money_expanse = $request->post('personal_expanse');
            $pay_salary->advanced_amount = 0;
            $pay_salary->created_by = Auth::user()->id;
            if($own_money_expanse != 0){
              $pay_salary->current_amount = $main_salary + $own_money_expanse; // inilial Salary;
              $pay_salary->personal_expanse = $own_money_expanse;
            }
            else{
              $pay_salary->current_amount = $main_salary; // inilial Salary;
              $pay_salary->personal_expanse = 0;
            }
          }
          else{

            $own_money_expanse = $request->post('personal_expanse'); // From own pocket

            if($own_money_expanse != 0){

              $advanced_amount = $request->post('advanced_amount');// Advance Amount of money
              $sumation = $main_salary - $advanced_amount + $own_money_expanse;

              if($sumation <= 0){
                  Alert::warning('Warning', 'Your Advanced Amount cannot extend your Salary');
                  return redirect()->route('salary.create');
              }
              else{
                $advanced_amount = $request->post('advanced_amount');// Advance Amount of money
                $pay_salary->employee_id = $employee_id;
                $pay_salary->month = $month;
                $pay_salary->year = $year;
                $pay_salary->status = 0;
                $pay_salary->advanced_salary = $advance_salary; // Option (yes / no);
                $pay_salary->advanced_amount = $advanced_amount;
                $pay_salary->created_by = Auth::user()->id;

                $pay_salary->current_amount = $main_salary - $advanced_amount + $own_money_expanse; // inilial Salary;
                $pay_salary->personal_expanse = $own_money_expanse;
              }
            }
            else{
              $advanced_amount = $request->post('advanced_amount');// Advance Amount of money
              $sumation = $main_salary - $advanced_amount + $own_money_expanse;

              if($sumation < 0){
                  Alert::warning('Warning', 'Your Advanced Amount cannot extend your Salary');
                  return redirect()->route('salary.create');
              }
              else{
                $advanced_amount = $request->post('advanced_amount');// Advance Amount of money
                $pay_salary->employee_id = $employee_id;
                $pay_salary->month = $month;
                $pay_salary->year = $year;
                $pay_salary->status = 0;
                $pay_salary->advanced_salary = $advance_salary; // Option (yes / no);
                $pay_salary->advanced_amount = $advanced_amount;
                $pay_salary->created_by = Auth::user()->id;

                $pay_salary->current_amount = $main_salary - $advanced_amount; // inilial Salary;
                $pay_salary->personal_expanse = 0;
              }
            }
          }
        $pay_salary->save();

        Alert::success('Success', 'Successfully Created a Employee Bill');
        return redirect()->route('salary.create');
      }
      else{
        Alert::warning('Warning', 'Already Bill Created');
        return redirect()->route('salary.create');
      }
  }


  public function getSalaryList(Request $request)
  {
      $salaries = Salary::orderby('year','DESC')->orderby('month','DESC')->get();
      return view("salaries.all_salary_list",[
        'salaries' => $salaries,
      ]);
  }
  public function detailSalary(Request $request,$id)
  {
    $getSalary = Salary::where('id',$id)->first();
    $employeeID = Salary::where('id',$id)->pluck('employee_id');
    $getEmployee = Employee::where('id',$employeeID)->first();
    return view("salaries.bill_page",[
      'getSalary' => $getSalary,
      'getEmployee' => $getEmployee,
    ]);
  }
  public function paySalary(Request $request)
  {
      $salaryID = $request->post('salary_id');
      $salary = Salary::find($salaryID);

      $salary->status = 1;
      $salary->save();

      $getSalary = Salary::where('id',$salaryID)->first();
      $employeeID = Salary::where('id',$salaryID)->pluck('employee_id');
      $getEmployee = Employee::where('id',$employeeID)->first();
      return view("salaries.bill_page",[
        'getSalary' => $getSalary,
        'getEmployee' => $getEmployee,
      ]);
  }
  public function  deleteSalary(Request $request)
  {
        $salaryID = $request->post('salary_id');

        $delete_salary = Salary::where('id',$salaryID)->delete();

        Alert::success('Success', 'Successfully Removed');
        return redirect()->back();
  }
  public function editSalary(Request $request,$id)
  {
      $employees = Employee::get();
      $salary =  Salary::where('id',$id)->first();
      return view("salaries.edit_salary",[
        'employees' => $employees,
        'salary' => $salary,
      ]);
  }
  public function updateSalary(Request $request)
  {
      $validator = Validator::make($request->all(), [
          'employee'   => 'required',
          'month'  => 'required',
          'year' => 'required',
          'advance_salary_option' => 'required',
          'salary_id' => 'required',
          'advanced_amount' => 'required',
          'personal_expanse' => 'required',
       ]);

      if($validator->fails()){
        alert()->warning('Error occured',$validator->errors()->all()[0]);
        return redirect()->back()->withInput()->withErrors($validator);
      }

      $salary_id = $request->post('salary_id');
      $employee_id = $request->post('employee');
      $employee =  Employee::where('id',$employee_id)->first();
      $main_salary = $employee->salary;

      $salary = Salary::where('id',$salary_id)->first();

      $month = $request->post('month');
      $year = $request->post('year');
      $advance_salary = $request->post('advance_salary_option');
      $advanced_amount = $request->post('advanced_amount');
      $personal_expanse = $request->post('personal_expanse');


      $salary->employee_id = $employee_id;
      $salary->month = $month;
      $salary->year = $year;
      $salary->status = 0;
      $salary->advanced_salary = $advance_salary; // Option (yes / no);
      $salary->advanced_amount = $advanced_amount;
      $salary->personal_expanse = $personal_expanse;
      $salary->current_amount = $main_salary - $advanced_amount + $personal_expanse;
      $salary->save();

      Alert::success('Success', 'Successfully Updated Employee Bill');
      return redirect()->back();
  }
  public function pdfDownloadSalaryBill(Request $request)
  {
      $id =$request->post('salary_id');

      $getSalary = Salary::where('id',$id)->first();
      $employeeID = Salary::where('id',$id)->pluck('employee_id');
      $getEmployee = Employee::where('id',$employeeID)->first();
      $pdf = PDF::loadView("salaries.bill_print",[
        'getSalary' => $getSalary,
        'getEmployee' => $getEmployee,
      ])
      ->setPaper('a4');

      return $pdf->download('bill_employee_'.$id.'.pdf');
  }
  public function getUnpaidSalaryList(Request $request)
  {
      $salaries = Salary::where('status', 0)->get();
      return view("salaries.unpaid_salary_list",[
        'salaries' => $salaries,
      ]);
  }
  public function getPaidSalaryList(Request $request)
  {
      $salaries = Salary::where('status', 1)->get();
      return view("salaries.paid_salary_list",[
        'salaries' => $salaries,
      ]);
  }
}
