@extends('layout.default')

@section('title')
Welcome  {{$user->lastname}} {{$user->firstname}}
@stop

@section('content')
  <!-- Page -->

      <div class="row" data-plugin="matchHeight" data-by-row="true">

                    <div class="col-xlg-3 col-md-12">
                        <div class="row height-full">
                            <div class="col-xlg-12 col-md-4" style="height:50%;">
                                <!-- Panel Overall Sales -->
                                <div class="widget widget-shadow">
                                    <div class="widget-content widget-radius padding-30 bg-brown-600 white">
                                        <div class="counter counter-lg counter-inverse text-left">
                                            <div class="counter-label margin-bottom-20">
                                                <div>PROPERTY RENT</div>

                                            </div>
                                            <div class="counter-number-group margin-bottom-15">
                                                <span class="counter-number-related">GHS</span>
                                                <span class="counter-number">14,000</span>
                                            </div>
                                            <div class="counter-label">
                                                <div class="progress progress-xs margin-bottom-10 bg-brown-800">
                                                    <div class="progress-bar progress-bar-info bg-white" style="width: 42%" aria-valuemax="100"
                                                         aria-valuemin="0" aria-valuenow="42" role="progressbar">
                                                        <span class="sr-only">42%</span>
                                                    </div>
                                                </div>
                                                <div class="counter counter-sm text-left">
                                                    <div class="counter-number-group">
                                                        <span class="counter-number font-size-14">42%</span>
                                                        <span class="counter-number-related font-size-14">HIGHER THAN LAST MONTH</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Panel Overall Sales -->
                            </div>

                            <div class="col-xlg-12 col-md-4" style="height:50%;">
                                <!-- Panel Today's Sales -->
                                <div class="widget widget-shadow">
                                    <div class="widget-content widget-radius padding-30 bg-red-600 white">
                                        <div class="counter counter-lg counter-inverse text-left">
                                            <div class="counter-label margin-bottom-20">
                                                <div>ELECTRICITY</div>

                                            </div>
                                            <div class="counter-number-group margin-bottom-10">
                                                <span class="counter-number-related">GHS</span>
                                                <span class="counter-number">41,160</span>
                                            </div>
                                            <div class="counter-label">
                                                <div class="progress progress-xs margin-bottom-10 bg-red-800">
                                                    <div class="progress-bar progress-bar-info bg-white" style="width: 70%" aria-valuemax="100"
                                                         aria-valuemin="0" aria-valuenow="70" role="progressbar">
                                                        <span class="sr-only">70%</span>
                                                    </div>
                                                </div>
                                                <div class="counter counter-sm text-left">
                                                    <div class="counter-number-group">
                                                        <span class="counter-number font-size-14">70%</span>
                                                        <span class="counter-number-related font-size-14">HIGHER THAN LAST MONTH</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Panel Today's Sales -->
                            </div>
                            <div class="col-xlg-12 col-md-4" style="height:50%;">
                                <!-- Panel Today's Sales -->
                                <div class="widget widget-shadow">
                                    <div class="widget-content widget-radius padding-30 bg-blue-700 white">
                                        <div class="counter counter-lg counter-inverse text-left">
                                            <div class="counter-label margin-bottom-20">
                                                <div>WATER</div>

                                            </div>
                                            <div class="counter-number-group margin-bottom-10">
                                                <span class="counter-number-related">GHS</span>
                                                <span class="counter-number">41,160</span>
                                            </div>
                                            <div class="counter-label">
                                                <div class="progress progress-xs margin-bottom-10 bg-blue-800">
                                                    <div class="progress-bar progress-bar-info bg-white" style="width: 70%" aria-valuemax="100"
                                                         aria-valuemin="0" aria-valuenow="70" role="progressbar">
                                                        <span class="sr-only">70%</span>
                                                    </div>
                                                </div>
                                                <div class="counter counter-sm text-left">
                                                    <div class="counter-number-group">
                                                        <span class="counter-number font-size-14">70%</span>
                                                        <span class="counter-number-related font-size-14">LOWER THAN LAST MONTH</span>
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


                    <div class="col-xlg-9 col-md-12">  
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
                                    <tbody>
                                        <tr>
                                            <td>0244</td>
                                            <td>ECG</td>
                                            <td>GHS 450</td>
                                            <td>1 Jan 2015</td>

                                        </tr>
                                        <tr>
                                            <td>0534</td>
                                            <td>GWCL</td>
                                            <td>GHS 430</td>
                                            <td>23 Apr 2015</td>

                                        </tr>
                                        <tr>
                                            <td>0634</td>
                                            <td>ECG</td>
                                            <td>GHS 350</td>
                                            <td>10 Sep 2014</td>

                                        </tr>

                                        <tr>
                                            <td>0834</td>
                                            <td>Lands Commission</td>
                                            <td>GHS 289</td>
                                            <td>20 Feb 2014</td>

                                        </tr>
                                        <tr>
                                            <td>0934</td>
                                            <td>Lands Commission</td>
                                            <td>GHS 230</td>
                                            <td> 22 Aug 2013</td>

                                        </tr>



                                    </tbody>
                                </table>
                            </div>
                        </div> 
                    </div>
                </div>
  <!-- End Page -->

@stop