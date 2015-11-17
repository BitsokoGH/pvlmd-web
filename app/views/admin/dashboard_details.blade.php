@extends('layout.default')

@section('title')
Dashboard
@stop

@section('content')

<div class="page-content">
   <div class="row height-full">
       

    </div>

    <div class="row height-full" style="border-top: solid 1px #ccc">
        <div class="col-xlg-4 col-md-4" style="height:50%;">
            <h3>Rent <div class="" style="float: right">{{@date('M Y')}}</div></h3>
            
            @foreach($paid as $k=>$val)
            <div >{{$k}} <span class="badge badge-dark">{{number_format($val)}}</span></div>
            @endforeach
        </div>
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
                 <td>Action</td>
             </tr>
             @foreach($recentpayment as $p=>$pay)
             <tr>
                 <td>{{$pay->invoice_number}}</td>
                 <td>{{$pay->paid_for}}</td>
                 <td></td>
                 <td>{{number_format($pay->amount_paid)}}</td>
                 <td>{{date('D M d, Y',strtotime($pay->date_paid))}}</td>
                 <td><a href="#{{$pay->invoice_number}}" class="label label-primary">view</a></td>
             </tr>
             @endforeach
             </table>
        </div>
    
    </div></div>
    
@stop
@section('script')

@stop