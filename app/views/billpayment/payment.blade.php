@extends('layout.default')

@section('title')
Payment - {{$user->lastname}} {{$user->firstname}}
@stop

@section('content')

<div class="page-content">


    <div class="col-xlg-12 col-md-12">
        <div class="row height-full">
            
           @foreach($payitems as $payment)
            <div class="col-xlg-4 col-md-4" style="height:50%;">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <a href="{{URL::to('billpayment/process')}}/{{$payment["type"]}}" ><img src="{{ asset('assets/images/'.$payment["type"].'.jpg')}}"  alt="{{$payment["name"]}}" class="center-block"/></a>
                    </div>
                    <div class="panel-footer text-center"><a href="{{URL::to('billpayment/process')}}/{{$payment["type"]}}" >{{$payment["name"]}}</a></div>
                </div>
            </div>
           @endforeach
        </div>


        <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
            <thead>
                <tr>
                    <th>Ref. No</th>
                    <th>Vendor</th>
                    <th>Payments</th>
                    <th>Date</th>

                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Ref. No</th>
                    <th>Vendor</th>
                    <th>Payments</th>
                    <th>Date</th>

                </tr>
            </tfoot>
            <tbody
                @foreach($payments as $b=>$pay)
                <tr>
                    <td>{{$pay->invoice_number}}</td>
                    <td>{{strtoupper($pay->bill_type)}}</td>

                    <td>{{number_format($pay->amount_paid)}}</td>
                    <td>{{date('D M d, Y',strtotime($pay->created_at))}}</td>
                </tr>
                @endforeach




            </tbody>
        </table>
</div>



</div>
@stop
@section('script')

@stop