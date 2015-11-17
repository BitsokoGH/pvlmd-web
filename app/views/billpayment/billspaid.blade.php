@extends('layout.default')

@section('title')
Bills
@stop

@section('content')

<div class="page-content">
   <div class="row height-full">
       

    </div>

    
    <div>
        <div class="" style="height:50%;">
             <h3>Bill Payments {{$billsummary["name"]}}</h3>
             <table class="table table-hover dataTable table-striped width-full">
                 <tr>
                 <td>Ref No</td>
                 <td>Payee</td>
                 <td>Property</td>
                 <td>Amount</td>
                 <td>Date</td>
                 <td>Status</td>
             </tr>
             @foreach($recentpayment as $p=>$pay)
             <tr>
                 <td>{{$pay->bill_item_id}}</td>
                 <td>{{$pay->period}}</td>
                 <td></td>
                 <td>{{number_format($pay->status)}}</td>
                 <td>{{date('D M d, Y',strtotime($pay->created_at))}}</td>
        
             </tr>
             @endforeach
             </table>
        </div>
    
    </div></div>
    
@stop
@section('script')

@stop