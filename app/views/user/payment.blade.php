@extends('layout.default')

@section('title')
Profile - {{$user->lastname}} {{$user->firstname}}
@stop

@section('content')

                <div id="wallet-table">
                    <div class="panel">
                        <div class="panel-heading">

                            <h3 class="panel-title">Mobile Wallet List</h3>
                            <div class="panel-actions">
                                <a type="button" class="btn btn-primary btn-sm pull-right" id="add-new-wallet-button">
                                    Add New Mobile Wallet
                                </a>
                            </div>

                        </div>
                        <div class="panel-body">
                            <table class="table table-hover  table-striped width-full" >
                                <thead>
                                    <tr>
                                        <th>Account Number</th>
                                        <th>Provider</th>
                                        <th>Status</th>


                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($wallets as $k=>$wallet)
                                    <tr>
                                        <td>{{$wallet->wallet_no}}</td>
                                        <td>{{$wallet->mobile_provider}}</td>
                                        <td>{{$wallet->wallet_status}}</td>


                                    </tr>
                                    @endforeach






                                </tbody>
                            </table>
                        </div>
                    </div>   
                </div>

 {{ Form::open(array('url'=> 'profile/payment','method'=>'post')) }}

                <div id="wallet-form" style="display: none">
                    <div class="panel panel-bordered">
                        <div class="panel-heading">
                            <h3 class="panel-title">Add Wallet</h3>
                            <div class="panel-actions">
                                <button type="button" class="btn btn-primary btn-sm pull-right" id="back-wallet-table">
                                    Back to Wallet List
                                </button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form class="validate form-horizontal" autocomplete="off">

                                <div class="form-group">
                                    <label class="control-label col-md-4">Select Mobile Wallet Provider</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="mobile_provider">
                                            <option>Select an option</option>
                                            <option>MTN Mobile Money</option>
                                            <option>Airtel Money</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Mobile Number</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="mobile_number" id="mobileNumber" placeHolder="xxxxxxxxxxx"
                                               value="" /> 
                                        <div id = "reqtokenbuttondiv">
                                            <input type='button' id='reqtoken' name='reqtoken' value='Request Verification Code' class='btn btn-primary  btn-block' />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Confirmation Code</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="confirm_code" id="confirmCode" required=""
                                               value="" />
                                        <span id="confirmResult" >Confirmation Code will be sent to your mobile phone number you provided</span>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4"></label>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">Add Wallet</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div></div>
  {{ Form::close() }}
@stop
@section('script')
 <script type="text/javascript">

            (function (document, window, $) {
                'use strict';

                var Site = window.Site;

                $(document).ready(function ($) {
                    Site.run();
                });

                // Actions Happen during Back Button Click in Add Wallet Form
                $('#back-wallet-table').click(function () {

                    $('#wallet-form').hide();
                    $('#wallet-table').show();

                });
                // Actions Happen during Add Button Click in List Wallets
                $('#add-new-wallet-button').click(function () {
                    $('#wallet-table').hide();
                    $('#wallet-form').show();



                });
            })(document, window, jQuery);




        </script>

@stop