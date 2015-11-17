@extends('layout.default')

@section('title')
Dashboard
@stop

@section('content')

<div class="page-content">
   <div class="row height-full">
       @foreach($billsummary as $p=>$lc)
                            <div class="col-xlg-4 col-md-4" style="height:50%;">
                                <!-- Panel Overall Sales -->
                                <div class="widget widget-shadow">
                                    <div class="widget-content widget-radius padding-30 bg-brown-600 white">
                                        <div class="counter counter-lg counter-inverse text-left">
                                            <div class="counter-label margin-bottom-20">
                                                <div>{{$lc["name"]}}</div>

                                            </div>
                                            <div class="counter-number-group margin-bottom-15">
                                                <span class="counter-number-related">GHS</span>
                                                <span class="counter-number">{{number_format($lc["thismonth"])}}</span>
                                            </div>
                                            <div class="counter-label">
                                                <div class="progress progress-xs margin-bottom-10 bg-brown-800">
                                                    <div class="progress-bar progress-bar-info bg-white" style="width: {{$lc["percent"]}}%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="42" role="progressbar">
                                                        <span class="sr-only">{{$lc["percent"]}}</span>
                                                    </div>
                                                </div>
                                                <div class="counter counter-sm text-left">
                                                    <div class="counter-number-group">
                                                        <span class="counter-number font-size-14">{{number_format($lc["percent"])}}%</span>
                                                        <span class="counter-number-related font-size-14">{{$lc["monthstatus"]}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Panel Overall Sales -->
                            </div>

       @endforeach

    </div>

    <div class="row height-full" style="border-top: solid 1px #ccc">
        <div class="col-xlg-4 col-md-4" style="height:50%;">
            <h3>Rent <div class="" style="float: right">{{@date('M Y')}}</div></h3>
            
            @foreach($paid as $k=>$val)
            <div >{{$k}} <span class="badge badge-dark">{{number_format($val)}}</span></div>
            @endforeach
        </div>
        <div class="col-xlg-4 col-md-4" style="height:50%;">
             <h3>Payments <div class="" style="float: right">{{@date('M Y')}}</div></h3>
             <table class="table table-hover dataTable table-striped width-full">
                 <tr>
                 <td>Payee</td>
                 <td>Property</td>

                 <td>Bill Type</td>
                 <td>Amount</td>
             </tr>
             @foreach($recentpayment as $p=>$pay)
             <tr>
                 <td>{{$pay->paid_for}}</td>
                 <td>{{$pay->property_id}}</td>
                 <td>{{strtoupper($pay->bill_type)}}</td>
                 <td>{{number_format($pay->amount_paid)}}</td>
             </tr>
             @endforeach
             </table>
        </div>
        <div class="col-xlg-4 col-md-4" style="height:50%;">
            
             <h3>Support <div class="" style="float: right"></div></h3>
        </div>
    </div></div>
    
@stop
@section('script')

@stop