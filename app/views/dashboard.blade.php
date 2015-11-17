@extends('layout.default')

@section('title')
Welcome  {{$user->lastname}} {{$user->firstname}}
@stop

@section('content')
<!-- Page -->

<div class="row" data-plugin="matchHeight" data-by-row="true">

    <div class="col-xlg-12 col-md-12">
        <div class="row height-full">
            <div class="col-xlg-4 col-md-4" style="height:50%;">
                <!-- Panel Overall Sales -->
                <div class="widget widget-shadow">
                    <div class="widget-content widget-radius padding-30 bg-brown-600 white">
                        <div class="counter counter-lg counter-inverse text-left">
                            <div class="counter-label margin-bottom-20">
                                <div>PROPERTY RENT</div>

                            </div>
                            <div class="counter-number-group margin-bottom-15">
                                <span class="counter-number-related">GHS</span>
                                <span class="counter-number">{{number_format($lc)}}</span>
                            </div>
                            <div class="counter-label">
                                <div class="progress progress-xs margin-bottom-10 bg-brown-800">
                                    <div class="progress-bar progress-bar-info bg-white" style="width: 42%" aria-valuemax="100"
                                         aria-valuemin="0" aria-valuenow="-" role="progressbar">
                                        <span class="sr-only">-</span>
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

            <div class="col-xlg-4 col-md-4" style="height:50%;">
                <!-- Panel Today's Sales -->
                <div class="widget widget-shadow">
                    <div class="widget-content widget-radius padding-30 bg-red-600 white">
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
                                        <span class="sr-only">%</span>
                                    </div>
                                </div>
                                <div class="counter counter-sm text-left">
                                    <div class="counter-number-group">
                                        <span class="counter-number font-size-14">-%</span>
                                        <span class="counter-number-related font-size-14">-</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Panel Today's Sales -->
            </div>
            <div class="col-xlg-4 col-md-4" style="height:50%;">
                <!-- Panel Today's Sales -->
                <div class="widget widget-shadow">
                    <div class="widget-content widget-radius padding-30 bg-blue-700 white">
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
                                        <span class="counter-number font-size-14"></span>
                                        <span class="counter-number-related font-size-14"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    </div>

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
                        <td>{{strtoupper($pay->status)}}<?php ?></td>

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