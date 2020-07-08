<!DOCTYPE html>
<html>

   <head>
      <title>HTML to PDF</title>
   </head>

   <!-- Bootstrap CSS
   ============================================ -->
   <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
   <!-- Bootstrap CSS
   ============================================ -->
   <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

   <body>
     <div class="container">
     <div class="row">
         <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
             <div class="row">
                 <div class="col-xs-6 col-sm-6 col-md-6">
                     <address>
                         <strong>{{ $getEmployee->user->name }}</strong>
                         <br>
                         {{ $getEmployee->address }}
                         <br>
                         {{ $getEmployee->nid_number }}
                         <br>
                         {{ $getEmployee->user->email }}
                         <br>
                         <abbr title="Mobile">M:</abbr> {{ $getEmployee->user->mobile_no }}
                     </address>
                 </div>
                 <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                     <p>
                         <em><b>Date:</b>  {{	date("l jS \of F Y") }}</em>
                     </p>
                     <p>
                       <em>
                         <b>Month: </b>{{ $getSalary->month }}
                         </br>
                         <b>Year: </b>{{ $getSalary->year }}
                         </br>
                         @if($getSalary->status == 0)
                           <b>Status: </b><span class="text-danger">{!! App\Salary::getStatus($getSalary->status) !!}</span>
                         @else
                           <b>Status: </b><span class="text-success">{!! App\Salary::getStatus($getSalary->status) !!}</span>
                         @endif
                       </em>
                     </p>
                 </div>
             </div>
             <div class="row">
                 <div class="text-center">
                     <h1>Receipt</h1>
                 </div>
                 </span>
                 <table class="table table-hover">
                     <thead>
                         <tr>
                             <th>Index</th>
                             <th></th>
                             <th class="text-center"></th>
                             <th class="text-center">Amount</th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td class="col-md-9"><em>Salary</em></h4></td>
                             <td class="col-md-1" style="text-align: center"></td>
                             <td class="col-md-1 text-center"></td>
                             <td class="col-md-1 text-center">{{ $getEmployee->salary }}</td>
                         </tr>
                         <tr>
                             <td class="col-md-9"><em>Advanced Payment</em></h4></td>
                             <td class="col-md-1" style="text-align: center"></td>
                             <td class="col-md-1 text-center"></td>
                             <td class="col-md-1 text-center">{{ $getSalary->advanced_amount }}</td>
                         </tr>
                         <tr>
                             <td class="col-md-9"><em>Personal Expanse</em></h4></td>
                             <td class="col-md-1" style="text-align: center"></td>
                             <td class="col-md-1 text-center"></td>
                             <td class="col-md-1 text-center">{{ $getSalary->personal_expanse }}</td>
                         </tr>
                         <tr>
                             <td></td>
                             <td></td>
                             <td class="text-right"><h4><strong>Total:</strong></h4></td>
                             <td class="text-center text-danger"><h4><strong>{{ $getSalary->current_amount }}</strong></h4></td>
                         </tr>
                     </tbody>
                 </table>
                 @if($getSalary->status == 0)
                   <form action="{{ route('salary.pay') }}" method="post">
                     @csrf
                     <input type="hidden" name="salary_id" value="{{$getSalary->id}}">
                     <button type="submit" class="btn btn-success btn-lg btn-block">
                         Pay Now   <span class="glyphicon glyphicon-chevron-right"></span>
                     </button>
                   </form>
                 @endif
             </div>
         </div>
     </div>
   </body>

</html>
