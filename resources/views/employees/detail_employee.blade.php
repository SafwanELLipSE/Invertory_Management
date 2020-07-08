@extends('layouts.app')

@section('additional_headers')
  <!-- forms CSS  ============================================ -->
  <link rel="stylesheet" href="{{ asset('css/form/all-type-forms.css') }}">
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
                                <li>
                                  <a href="{{route('employee.all_employees')}}" class="bread-blod">All Employees List</a> <span class="bread-slash">/</span>
                                </li>
                                <li>
                                  <span class="bread-blod">Employee Detail</span>
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

<!-- Main Starts -->
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="profile-info-inner">
                    <div class="profile-img">
                      @if($employee->photo == "" && $employee->gender == 0)
                        <img src="{{ asset('img/user_icon/employee-male.png') }}" alt="profile Image" />
                      @elseif($employee->photo == "" && $employee->gender == 1)
                        <img src="{{ asset('img/user_icon/employee-female.png') }}" alt="profile Image" />
                      @else
                        <img src="/employee_image/{{ $employee->photo }}" alt="profile Image" />
                      @endif
                    </div>
                    <div class="profile-details-hr">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                <div class="address-hr">
                                    <p><b>Name</b><br /> {{$employee->user->name}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                    <p><b>Experience</b><br /> {{$employee->experience}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                <div class="address-hr">
                                    <p><b>Email ID</b><br /> {{$employee->user->email}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                    <p><b>Phone</b><br /> {{$employee->user->mobile_no}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="address-hr">
                                    <p><b>Address</b><br /> {{$employee->address}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                    <ul id="myTabedu1" class="tab-review-design">
                        <li class="active"><a href="#reviews"> Biography</a></li>
                        <li><a href="#INFORMATION">Add Skill</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="reviews">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                <div class="address-hr biography">
                                                    <p><b>Full Name</b><br /> {{$employee->user->name}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                <div class="address-hr biography">
                                                    <p><b>Mobile</b><br /> {{$employee->user->mobile_no}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                <div class="address-hr biography">
                                                    <p><b>Gender</b><br /> {!! App\Employee::getGender($employee->user->gender) !!}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                <div class="address-hr biography">
                                                    <p><b>City</b><br /> {{$employee->city}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="content-profile">
                                                    <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras
                                                        dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                                    <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras
                                                        dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                                    <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras
                                                        dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                                </div>
                                            </div>
                                        </div>
                                        @if(count($get_skills) != 0)
                                          <div class="row mg-b-15">
                                              <div class="col-lg-12">
                                                  <div class="row">
                                                      <div class="col-lg-12">
                                                          <div class="skill-title">
                                                              <h2>Skill Set</h2>
                                                              <hr/>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  @foreach($get_skills as $skill)
                                                    <div class="progress-skill">
                                                      <form action="{{ route('employee.delete_skill')  }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                          <input type="hidden" name="employee_id" value="{{$employee->id}}">
                                                          <input type="hidden" name="skill_id" value="{{$skill->id}}">
                                                          <h2> {{ $skill->name }}  <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></h2>
                                                      </form>

                                                        <div class="progress progress-mini">
                                                            <div style="width: {{ $skill->progress }}%;" class="progress-bar progress-green"></div>
                                                        </div>
                                                    </div>
                                                  @endforeach
                                              </div>
                                          </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-tab-list tab-pane fade" id="INFORMATION">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                      <form action="{{ route('employee.add_skill') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="hidden" name="employee_id" value="{{$employee->id}}">
                                                    <input name="skill_name" type="text" class="form-control" placeholder="Skill Name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <select name="progress" class="form-control">
                    																	<option>Select Skill Level</option>
                    																	<option value="20">1</option>
                    																	<option value="40">2</option>
                    																	<option value="50">3</option>
                    																	<option value="80">4</option>
                    																	<option value="100">5</option>
                    																</select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="payment-adress mg-t-15">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mg-b-15">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                      </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Ends -->


@endsection

@section('additional_scripts')


@endsection
