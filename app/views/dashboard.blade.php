@extends('layout.default')

@section('title')
Welcome  {{$user->lastname}} {{$user->firstname}}
@stop

@section('content')
<!-- Page -->

<div class="row" data-plugin="matchHeight" data-by-row="true">

    <div class="col-xlg-12 col-md-12">
        <div class="row height-full">
<a href="{{URL::to('/billpayment/process/lc')}}">
            <div class="col-xlg-4 col-md-4" style="height:50%;">
                <!-- Panel Overall Sales -->
                <div class="widget widget-shadow">
                    <div class="widget-content widget-radius padding-30 bg-brown-600 white"  style="height:217px">
                        <div class="counter counter-lg counter-inverse text-left">
                            <div class="counter-label margin-bottom-20">
                                <div>GROUND RENT</div>

                            </div>
                            <div class="counter-number-group margin-bottom-15">
                                <span class="counter-number-related">GHS</span>
                                <span class="counter-number">{{number_format($lc)}}</span>
                            </div>
                            <div class="counter-label">
                                <div class="progress progress-xs margin-bottom-10 bg-brown-800">
                                    <div class="progress-bar progress-bar-info bg-white" style="width: 42%" aria-valuemax="100"
                                         aria-valuemin="0" aria-valuenow="-" role="progressbar">
                                        <span class="sr-only"></span>
                                    </div>
                                </div>
                                <div class="counter counter-sm text-left">
                                    <div class="counter-number-group">
                                        <span class="counter-number font-size-14">-</span>
                                        <span class="counter-number-related font-size-14">-</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Panel Overall Sales -->
            </div>
</a>
<a href="{{URL::to('/billpayment/process/ecg')}}">

            <div class="col-xlg-4 col-md-4" style="height:50%;">
                <!-- Panel Today's Sales -->
                <div class="widget widget-shadow">
                    <div class="widget-content widget-radius padding-30 bg-red-600 white" style="height:217px">
                        <div class="counter counter-lg counter-inverse text-left">
                            <div class="counter-label margin-bottom-20">
                                <div>ELECTRICITY</div>

                            </div>
                            <div class="counter-number-group margin-bottom-10">
                                <span class="counter-number-related">GHS</span>
                                <span class="counter-number">-,----</span>
                            </div>
                            <div class="counter-label">
                                <div class="progress progress-xs margin-bottom-10 bg-red-800">
                                    <div class="progress-bar progress-bar-info bg-white" style="width: 70%" aria-valuemax="100"
                                         aria-valuemin="0" aria-valuenow="70" role="progressbar">
                                        <span class="sr-only"></span>
                                    </div>
                                </div>
                                <div class="counter counter-sm text-left">
                                    <div class="counter-number-group">
                                        <span class="counter-number font-size-14">-</span>
                                        <span class="counter-number-related font-size-14">-</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Panel Today's Sales -->
            </div>
</a>
<a href="{{URL::to('/billpayment/process/gwcl')}}">
            <div class="col-xlg-4 col-md-4" style="height:50%;">
                <!-- Panel Today's Sales -->
                <div class="widget widget-shadow" >
                    <div class="widget-content widget-radius padding-30 bg-blue-700 white" style="height:217px">
                        <div class="counter counter-lg counter-inverse text-left">
                            <div class="counter-label margin-bottom-20">
                                <div>WATER</div>

                            </div>
                            <div class="counter-number-group margin-bottom-10">
                                <span class="counter-number-related">GHS</span>
                                <span class="counter-number">-,---</span>
                            </div>
                            <div class="counter-label">
                                <div class="progress progress-xs margin-bottom-10 bg-blue-800">
                                    <div class="progress-bar progress-bar-info bg-white" style="width: 70%" aria-valuemax="100"
                                         aria-valuemin="0" aria-valuenow="70" role="progressbar">
                                        <span class="sr-only"></span>
                                    </div>
                                </div>
                                <div class="counter counter-sm text-left">
                                    <div class="counter-number-group">
                                        <span class="counter-number font-size-14">-</span>
                                        <span class="counter-number-related font-size-14">-</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</a>
                <!-- End Panel Today's Sales -->
            </div>
        </div>
    </div>


    <div class="col-xlg-12 col-md-12">  
        <div class="panel">
            <div class="panel-heading">

                <h3 class="panel-title">Bill Payment History</h3>
            </div>
            <div class="panel-body">
                <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                    <thead>
                        <tr>
                            <th>Ref. No</th>
                            <th>Vendor</th>
                            <th>Payments</th>
                            <th>Date</th>

                        </tr>
                    </thead>
                 
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
    </div>
<!-- Modal Starts-->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Invoice</h4>
                            </div>
                            <div class="modal-body">
                                <div class="panel">
                                    <div class="panel-body container-fluid">

                                        <div class="row">
                                           
                                            <div class="col-md-6">
                                            
                                                <span>Invoice Date: Mon 5 July 2015</span>
                                                <br>
                                                <span>Payee: 2015</span>
                                              
                                            </div>
                                            <div class="col-md-6 text-right">

                                                <h4>Ref. No.</h4>
                                                <p>
                                                    <a class="font-size-20" href="javascript:void(0)">
                                                 2015GR/AMA/155/901
                                                 </a>

                                                </p>


                                            </div>
                                            

                                        </div>

                                        <div class="page-invoice-table table-responsive">
                                            <table class="table table-hover ">
                                                <thead>
                                                    <tr>

                                                        <th>Property</th>
                                                        <th>Acreage</th>

                                                        <th>Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            Labone Plot 5
                                                        </td>
                                                        <td>
                                                            5 Acres
                                                        </td>
                                                        <td>
                                                            500

                                                        </td>


                                                    </tr>



                                                </tbody>
                                            </table>
                                        </div>
 
                                        <div class="text-right clearfix">
                                            <div class="pull-right">
                                                <p>Sub - Total amount:
                                                    <span>GHS  500
                                                    </span>
                                                </p>
                                                <p>VAT:
                                                    <span>GHS 35</span>
                                                </p>
                                                <p class="page-invoice-amount">Grand Total:
                                                    <span>GHS 535</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-animate btn-animate-side btn-primary">
                                                <span><i class="icon wb-shopping-cart" aria-hidden="true"></i> Proceed
                                                    to payment</span>
                                            </button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal  Ends -->
    <div class="col-xlg-12 col-md-12">  
        <div class="panel">
            <div class="panel-heading">

                <h3 class="panel-title">Bills</h3>
            </div>
            <div class="panel-body">
                <table class="table table-hover dataTable table-striped width-full">
                    <tr>
                        <td>Ref No</td>
                        <td>Payee</td>
                        <td>Property</td>
                        <td>Amount</td>
                        <td>Date</td>
                        <td>Status</td>
                    </tr>
                    @foreach($bills as $p=>$pay)
                    <tr>
                        <td>{{$pay->bill_item_id}}</td>
                        <td>{{$pay->period}}</td>
                        <td></td>
                        <td>{{number_format($pay->amount)}}</td>
                        <td>{{date('D M d, Y',strtotime($pay->created_at))}}</td>
                        <td> <a href="{{strtoupper($pay->status)}}" data-toggle="modal" data-target="#myModal" class="badge badge-danger">NOT-PAID </a><?php ?></td>

                    </tr>
                    @endforeach
                </table>
            </div>
        </div> 
    </div>

    <div class="col-xlg-12 col-md-12">  
        <div class="panel">
            <div class="panel-heading">

                <h3 class="panel-title">Properties</h3>
            </div>
            <div class="panel-body">
                <table class="table table-hover dataTable table-striped width-full">
                    <tr>
                        <td>Property No</td>
                        <td>Type</td>
                        <td>Type of Use</td>
                        <td>Region</td>
                        <td>District</td>
                        <td>Location</td>
                        <td>Directions</td>
                        <td>Assignment Status</td>
               
                    </tr>
                    @foreach($properties as $p=>$property)
                    <tr>
                        <td>{{$property->property_id}}</td>
 <td>{{$property->property->property_type}}</td>
                        <td>{{$property->property->type_of_use}}</td>
                        <td>{{$property->property->region}}</td>
                        <td>{{$property->property->district}}</td>
                        <td>{{$property->property->location}}</td>
                        <td>{{$property->property->area}}</td>
                        <td>{{$property->property->assignment_status}}</td>
                       </tr>
                    @endforeach
                </table>
            </div>
        </div> 
    </div>

</div>
<!-- End Page -->

@stop