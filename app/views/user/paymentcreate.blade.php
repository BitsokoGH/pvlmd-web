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
                                        <td>{{$wallet->status}}</td>


                                    </tr>
                                    @endforeach






                                </tbody>
                            </table>
                        </div>
                    </div>   
                </div>
@stop