@extends('layouts.app')

@section('additional_headers')
  <!-- x-editor CSS  ============================================ -->
  <link rel="stylesheet" href="{{ asset('css/editor/select2.css') }}">
  <link rel="stylesheet" href="{{ asset('css/editor/datetimepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('css/editor/bootstrap-editable.css') }}">
  <link rel="stylesheet" href="{{ asset('css/editor/x-editor-style.css') }}">
  <!-- normalize CSS  ============================================ -->
  <link rel="stylesheet" href="{{ asset('css/data-table/bootstrap-table.css') }}">
  <link rel="stylesheet" href="{{ asset('css/data-table/bootstrap-editable.css') }}">
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
                                <li><span class="bread-blod">Paid Salary Bill List</span>
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


<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
  <div class="container-fluid">
      <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="sparkline13-list">
                  <div class="sparkline13-hd">
                      <div class="main-sparkline13-hd">
                          <h1>Paid <span class="table-project-n">Employees</span> List</h1>
                      </div>
                  </div>
                  <div class="sparkline13-graph">
                      <div class="datatable-dashv1-list custom-datatable-overright">
                          <div id="toolbar">
                              <select class="form-control dt-tb">
          											<option value="">Export Basic</option>
          											<option value="all">Export All</option>
          											<option value="selected">Export Selected</option>
          										</select>
                          </div>
                          <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                              data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                              <thead>
                                  <tr>
                                      <th data-field="state" data-checkbox="true"></th>
                                      <th class="text-center" data-field="id">ID</th>
                                      <th class="text-center" data-field="name" data-editable="true">Name</th>
                                      <th class="text-center" data-field="month<" data-editable="true">Month</th>
                                      <th class="text-center" data-field="year" data-editable="true">Year</th>
                                      <th class="text-center" data-field="current" data-editable="true">Current</th>
                                      <th class="text-center" data-field="advanced" data-editable="true">Advanced</th>
                                      <th class="text-center" data-field="personal" data-editable="true">Personal</th>
                                      <th class="text-center" data-field="created by" data-editable="true">Created By</th>
                                      <th class="text-center" data-field="created at" data-editable="true">Created At</th>
                                      <th class="text-center" data-field="View">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach($salaries as $item)
                                  <tr>
                                    <td></td>
                                    <td>{{$item->id}}</td>
                                    <td>{{ $item->employee->user->name }}</td>
                                    <td>{{ $item->month }}</td>
                                    <td>{{ $item->year }}</td>
                                    <td>{{ $item->current_amount }}</td>
                                    <td>{{ $item->advanced_amount }}</td>
                                    <td>{{ $item->personal_expanse }}</td>
                                    <td>{!! Auth::user($item->created_by)->name !!}</td>
                                    <td>{{ $item->created_at->format('d.m.Y') }}</td>
                                    <td>
                                      <form  action="{{ route('salary.delete') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="salary_id" value="{{$item->id}}">
                                        <a href="{{ route('salary.details',$item->id) }}" class="btn btn-primary btn-xs" style="color:#FFFFFF !important; margin-right: .2rem"><i class="fa fa-info-circle edu-informatio"></i></a> <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash edu-informatio"></i></button>
                                      </form>
                                      <form  action="{{ route('salary.bill_pdf') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="salary_id" value="{{$item->id}}">
                                        <button type="submit" class="btn btn-success btn-xs" style="margin-left:.2rem; margin-top:.2rem;"><i class="fa fa-download edu-informatio"></i> PDF</button>
                                      </form>
                                    </td>
                                  </tr>
                                @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- Static Table End -->


@endsection

@section('additional_scripts')
<!-- data table JS ============================================ -->
  <script src="{{ asset('js/data-table/bootstrap-table.js')}}"></script>
  <script src="{{ asset('js/data-table/tableExport.js')}}"></script>
  <script src="{{ asset('js/data-table/data-table-active.js')}}"></script>
  <script src="{{ asset('js/data-table/bootstrap-table-editable.js')}}"></script>
  <script src="{{ asset('js/data-table/bootstrap-editable.js')}}"></script>
  <script src="{{ asset('js/data-table/bootstrap-table-resizable.js')}}"></script>
  <script src="{{ asset('js/data-table/colResizable-1.5.source.js')}}"></script>
  <script src="{{ asset('js/data-table/bootstrap-table-export.js')}}"></script>
<!--  editable JS  ============================================ -->
  <script src="{{ asset('js/editable/jquery.mockjax.js')}}"></script>
  <script src="{{ asset('js/editable/mock-active.js')}}"></script>
  <script src="{{ asset('js/editable/select2.js')}}"></script>
  <script src="{{ asset('js/editable/moment.min.js')}}"></script>
  <script src="{{ asset('js/editable/bootstrap-datetimepicker.js')}}"></script>
  <script src="{{ asset('js/editable/bootstrap-editable.js')}}"></script>
  <script src="{{ asset('js/editable/xediable-active.js')}}"></script>
<!-- Chart JS		============================================ -->
  <script src="{{ asset('js/chart/jquery.peity.min.js')}}"></script>
  <script src="{{ asset('js/peity/peity-active.js')}}"></script>
<!-- tab JS  ============================================ -->
  <script src="{{ asset('js/tab.js')}}"></script>
<!-- plugins JS  ============================================ -->
  <script src="{{ asset('js/plugins.js')}}"></script>


@endsection
