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
   <style media="screen">
       .invoice-title h2, .invoice-title h3 {
         display: inline-block !important;
       }
       .table > tbody > tr > .no-line {
         border-top: none !important;
       }

       .table > thead > tr > .no-line {
         border-bottom: none !important;
       }

       .table > tbody > tr > .thick-line {
         border-top: 2px solid !important;
       }
   </style>
   <body>

     <div class="container">
         <div class="row">
             <div class="col-xs-1">
             </div>
             <div class="col-xs-10">
             <div class="invoice-title" style="margin-top:1.5rem;">
               <h2>Invoice</h2><h3 class="pull-right">Order # {{ $getOrder->ref_number }}</h3>
             </div>
             <hr>
             <div class="row">
               <div class="col-xs-6">
                 <address>
                 <strong>Billed To:</strong><br>
                   {{ $customer->name }}<br>
                   {{ $customer->address }}<br>
                   {{ $customer->city }}<br>
                   {{ $customer->mobile_no }}
                 </address>
               </div>
               <div class="col-xs-6 text-right">
                 <address>
                   <strong>Shipped To:</strong><br>
                   {{ $customer->name }}<br>
                   {{ $customer->address }}<br>
                   {{ $customer->city }}<br>
                   {{ $customer->mobile_no }}
                 </address>
               </div>
             </div>
             <div class="row">
               <div class="col-xs-6">
                 <address>
                   <strong>Payment Method:</strong><br>
                   {!! App\Customer::getPaymentMethod($customer->payment_method) !!}<br>
                   {{ $customer->email }}
                 </address>
               </div>
               <div class="col-xs-6 text-right">
                 <address>
                   <strong>Order Date:</strong><br>
                    {{	date("l jS \of F Y h:i:s A") }}<br><br>
                 </address>
               </div>
             </div>
           </div>
           <div class="col-xs-1">
           </div>
         </div>

         <div class="row">
           <div class="col-md-1">
           </div>
           <div class="col-md-10">
             <div class="panel panel-default">
               <div class="panel-heading">
                 <h3 class="panel-title"><strong>Order summary</strong></h3>
               </div>
               <div class="panel-body">
                 <div class="table-responsive">
                   <table class="table table-condensed">
                     <thead>
                       <tr>
                         <td><strong>Item</strong></td>
                         <td class="text-center"><strong>Price</strong></td>
                         <td class="text-center"><strong>Quantity</strong></td>
                         <td class="text-right"><strong>Totals</strong></td>
                       </tr>
                     </thead>
                     <tbody>
                       @php
                         $count = 0;
                         $total_amount = 0;
                       @endphp
                       @foreach($getProduct as $item)
                         @php
                           $count++;
                         @endphp
                         <tr>
                           <td>{{ $count }}. {{ $item->product->name}}</td>
                           <td class="text-center"> {{ $item->product->selling_price }} Tk</td>
                           <td class="text-center">{{ $item->quantity }}</td>
                           <td class="text-right">{{ $item->product->selling_price*$item->quantity }} Tk</td>
                         </tr>
                         @php
                           $total_amount = $total_amount + $item->product->selling_price*$item->quantity;
                         @endphp
                       @endforeach
                       @php
                         $total = $getOrder->total_amount;
                         $vat = $getOrder->vat;
                       @endphp
                       <tr>
                         <td class="no-line"></td>
                         <td class="no-line"></td>
                         <td class="no-line text-center"><strong>Sub Total</strong></td>
                         <td class="no-line text-right"> {{ $total_amount }} Tk</td>
                       </tr>
                       <tr>
                         <td class="no-line"></td>
                         <td class="no-line"></td>
                         <td class="no-line text-center"><strong>Vat({{ $vat }}%)</strong></td>
                         <td class="no-line text-right"> {{ ($total_amount*$vat)/100 }} Tk</td>
                       </tr>
                       <tr>
                         <td class="no-line"></td>
                         <td class="no-line"></td>
                         <td class="no-line text-center"><strong>Total</strong></td>
                         <td class="no-line text-right">{{ $total }} Tk</td>
                       </tr>
                     </tbody>
                   </table>
                 </div>
               </div>
             </div>
           </div>
           <div class="col-md-1">
           </div>
         </div>
     </div>
   </body>

</html>
