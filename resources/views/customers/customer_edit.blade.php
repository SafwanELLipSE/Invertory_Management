@extends('layouts.app')

@section('additional_headers')
      <!-- forms CSS ============================================ -->
      <link rel="stylesheet" href="{{ asset('css/form/all-type-forms.css') }}">
      <!-- dropzone CSS  ============================================ -->
      <link rel="stylesheet" href="{{ asset('css/dropzone/dropzone.css') }}">
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
                                <li>
                                  <a href="{{route('home')}}">Home</a> <span class="bread-slash">/</span>
                                </li>
                                <li>
                                  <a href="{{route('customer.all_customers')}}" class="bread-blod">All Customers List</a> <span class="bread-slash">/</span>
                                </li>
                                <li>
                                  <span class="bread-blod">Edit Customer Information</span>
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


<!-- Main starts -->
<div class="row">
    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
    </div>
    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
        <div class="admin-pro-accordion-wrap shadow-inner responsive-mg-b-30">
            <div class="alert-title">
                <h2>Edit Customer Information</h2>
            </div>
            <form action="{{ route('customer.save_edit') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="panel-group edu-custon-design" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading accordion-head">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Customer Credentials</a>
                        </h4>
                    </div>

                    <div id="collapse1" class="panel-collapse panel-ic collapse in">
                        <div class="panel-body admin-panel-content animated bounce">
                          <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <div class="form-group">
                                  <input type="hidden" name="customer_id" value="{{$customer->id}}">
                                  <input name="name" value="{{ $customer->name }}" type="text" class="form-control" placeholder="Name of Customer">
                              </div>
                              <div class="form-group">
                                  <input name="address" value="{{ $customer->address }}" type="text" class="form-control" placeholder="Address">
                              </div>
                              <div class="form-group">
                                  <input name="mobile" value="{{ $customer->mobile_no }}" type="number" class="form-control" maxlength="16" placeholder="Mobile Number">
                              </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-10">
                              <div class="form-group">
                                  <select name="gender" class="form-control">
                                    <option value="{{ $customer->gender }}" selected>{!! App\Customer::getGender($customer->gender) !!}</option>
                                    <option value="0">Male</option>
                                    <option value="1">Female</option>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <input name="city" value="{{ $customer->city }}" id="city" type="text" class="form-control" placeholder="City">
                              </div>
                              <div class="form-group">
                                  <input name="nid" value="{{ $customer->nid_number }}" type="number" class="form-control" maxlength="24" placeholder="National ID">
                              </div>
                            </div>
                          </div>
                          <div class="form-group-inner">
                            <div class="row">
                              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-10">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                      @if($customer->photo == "")
                                      <img src="{{ asset('img/user_icon/no-image.jpg')}}" alt="Editable Image" style="width: 70px; height: 70px; margin-left: 4rem">
                                      @else
                                        <img src="/customer_image/{{ $customer->photo }}" alt="Editable Image" style="width: 70px; height: 70px; margin-left: 4rem">
                                      @endif
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                        <label class="login2 pull-right pull-right-pro">File Upload Image</label>
                                    </div>
                                </div>
                              </div>
                              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-10">
                                  <div class="file-upload-inner file-upload-inner-right ts-forms">
                                      <div class="input append-small-btn" style="margin-top: 10px;">
                                          <input type="file" name="photo" id="append-small-btn" placeholder="no file selected">
                                      </div>
                                  </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-12">
                                  <div class="payment-adress">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="btn btn-success" style="color: #fff;">Next <i class="fa fa-arrow-right"></i></a>
                                  </div>
                              </div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading accordion-head">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Email & Payment Process</a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse panel-ic collapse">
                        <div class="panel-body admin-panel-content animated bounce">
                          <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="devit-card-custom">
                                    <div class="form-group">
                                        <input type="email" value="{{ $customer->email }}" class="form-control" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input name="shop_name"  value="{{ $customer->shop_name }}" type="text" class="form-control" placeholder="Name of Customer's Shop or Occupation">
                                    </div>
                                    <div class="form-group">
                                      <select name="payment_method" class="form-control">
                                        <option value="{{ $customer->payment_method }}" selected>{!! App\Customer::getPaymentMethod($customer->payment_method) !!}</option>
                                        <option value="0">Personal</option>
                                        <option value="1">Bank</option>
                                        <option value="2">Bkash</option>
                                        <option value="3">Rocket</option>
                                        <option value="4">Ecash</option>
                                      </select>
                                    </div>
                                </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-12">
                                  <div class="payment-adress">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="btn btn-danger" style="color: #fff;"><i class="fa fa-arrow-left"></i> Previous</a>
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="btn btn-success" style="color: #fff;">Next <i class="fa fa-arrow-right"></i></a>
                                  </div>
                              </div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading accordion-head">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Bank and Account Information</a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse panel-ic collapse">
                        <div class="panel-body admin-panel-content animated bounce">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="devit-card-custom">
                                <div class="form-group">
                                  <input type="text" value="{{ $customer->bank_name }}" name="bank_name" class="form-control" placeholder="Bank Name">
                                </div>
                                <div class="form-group">
                                  <input type="text" value="{{ $customer->bank_branch }}" name="bank_branch" class="form-control" placeholder="Bank Branch">
                                </div>
                                <div class="form-group">
                                  <input type="text" value="{{ $customer->account_name }}" name="account_name" class="form-control" placeholder="Account Name">
                                </div>
                                <div class="form-group">
                                  <input type="text" value="{{ $customer->account_number }}" name="account_number" class="form-control" placeholder="Account Number">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-12">
                                  <div class="payment-adress">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="btn btn-danger" style="color: #fff;"><i class="fa fa-arrow-left"></i> Previous</a>
                                    <button type="submit" class="btn btn-success" style="margin-top: 14px;">submit</button>
                                  </div>
                              </div>
                          </div>
                        </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
    </div>
</div>
<!-- Main Ends -->

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

@endsection
