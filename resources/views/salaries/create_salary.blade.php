@extends('layouts.app')

@section('additional_headers')
      <!-- forms CSS ============================================ -->
      <link rel="stylesheet" href="{{ asset('css/form/all-type-forms.css') }}">
      <!-- dropzone CSS  ============================================ -->
      <link rel="stylesheet" href="{{ asset('css/dropzone/dropzone.css') }}">
      <!-- chosen CSS  ============================================ -->
      <link rel="stylesheet" href="{{ asset('css/chosen/bootstrap-chosen.css') }}">
@endsection

@section('content')

<!-- Header starts -->
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <form role="search" class="sr-input-func">
                                    <input type="text" placeholder="Search..." class="search-int form-control">
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="{{route('home')}}">Home</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Add New Salary</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header Ends -->

</div><!-- dont delete this -->

<div class="row">
    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
    </div>
    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
      <div class="sparkline10-list mg-tb-30 responsive-mg-t-0 table-mg-t-pro-n dk-res-t-pro-0 nk-ds-n-pro-t-0">
        <div class="sparkline10-hd">
           <div class="main-sparkline10-hd">
               <h1>Create Employee Salary Bill</h1>
           </div>
       </div>
    <form action="{{ route('salary.save_created') }}" method="POST" enctype="multipart/form-data">
      @csrf
       <div class="sparkline10-graph">
           <div class="input-knob-dial-wrap">
               <div class="row">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="chosen-select-single mg-b-20">
                        <label><b>Select Employee</b></label>
                        <select name="employee" data-placeholder="Choose a Category" class="chosen-select" tabindex="-1">
                            <option value="none" selected="" disabled="">Choose a Employee</option>
                            @foreach($employees as $emp)
                               <option value="{{ $emp->id }}">{{ $emp->user->name }}</option>
                            @endforeach
                        </select>
                     </div>
                     <div class="chosen-select-single mg-b-20">
                        <label><b>Select Month</b></label>
                        <select name="month" data-placeholder="Choose a Month" class="chosen-select" tabindex="-1">
                            <option value="none" selected="" disabled="">Choose Month</option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                     </div>
                     <div class="form-group">
                         <label>Year</label>
                         <input name="year" type="number" class="form-control" placeholder="Year">
                     </div>
                     <div class="form-group">
                          <label>Do you Want to give Advance Salary?</label>
                         <select name="advance_salary_option" class="form-control">
                           <option value="none" selected="" disabled="">Choose Option</option>
                           <option value="0">No</option>
                           <option value="1">Yes</option>
                         </select>
                     </div>
                     <div class="form-group">
                         <label>Advanced Amount</label>
                         <input name="advanced_amount" type="number" class="form-control" placeholder="Advanced Amount">
                     </div>
                     <div class="form-group">
                         <label>Personal Expanse</label>
                         <input name="personal_expanse" type="number" class="form-control" placeholder="Personal Expanse">
                     </div>
                     <div class="row">
                         <div class="col-lg-12">
                             <div class="payment-adress">
                               <button type="submit" class="btn btn-primary">submit</button>
                             </div>
                         </div>
                     </div>
                   </div>
               </div>
            </div>
        </div>
      </form>
      </div>
    </div>
    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">

    </div>
</div>

@endsection

@section('additional_scripts')

  <!-- maskedinput JS
		============================================ -->
    <script src="{{ asset('js/jquery.maskedinput.min.js')}}"></script>
    <script src="{{ asset('js/masking-active.js')}}"></script>
    <!-- datepicker JS
		============================================ -->
    <script src="{{ asset('js/datepicker/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('js/datepicker/datepicker-active.js')}}"></script>
  <!-- form validate JS	============================================ -->
    <script src="{{ asset('js/form-validation/jquery.form.min.js')}}"></script>
    <script src="{{ asset('js/form-validation/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('js/form-validation/form-active.js')}}"></script>

  <!-- tab JS
  ============================================ -->
    <script src="{{ asset('js/tab.js')}}"></script>

  <!-- chosen JS  ============================================ -->
   <script src="{{ asset('js/chosen/chosen.jquery.js')}}"></script>
   <script src="{{ asset('js/chosen/chosen-active.js')}}"></script>

@endsection
