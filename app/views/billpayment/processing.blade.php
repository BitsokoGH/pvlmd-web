@extends('layout.default')

@section('title')
Bill Payment - {{$user->lastname}} {{$user->firstname}}
@stop

@section('content')


    <div class="panel panel-bordered">
        <div class="panel-heading">
            <h3 class="panel-title">{{$name}}</h3>
        </div>
        <div class="panel-body">
            
                    <div class="col-xlg-3 col-md-3" >
                        <img src="{{ asset('assets/images/'.$type.'.jpg')}}"  alt="{{$name}}" class="center-block"/> 
                        <div class="text-center">{{$name}}</div>
                    </div>
            
            <div class="col-xlg-3 col-md-3">
                @if($type=='lc')
                <table class="table table-hover dataTable table-striped width-full">
                    <tr>
                        <th>Property</th>
                        <th>Amount Due</th>

                    </tr>
                    @foreach($owe as $propertyAmt)
                    <tr>
                        <td>{{$propertyAmt["property"]}}</td>
                        <td>{{$propertyAmt["amt"]}}</td>

                    </tr>
                    @endforeach
                </table>
                @endif
            </div>
            
                    <div class="col-xlg-6 col-md-6" style="border-left:1px solid #e4eaec" >
                        {{ Form::open(array('url'=> 'billpayment','method'=>'post')) }}

                        <div class="form-group">
                            <label class="control-label">Select Property</label>
                            <div >
                                @if($type=='lc')
                                <select class="form-control" name="property">
                                    <option value=''>Select an option</option>
                                    @foreach($properties as $p=>$property)

                                    <option value="{{$property->property_id}}">{{$property->property->area.' , '.$property->property->location}}</option>
                                    @endforeach
                                </select>
                                @endif
                                @if($type!='lc')
                                <select class="form-control" name="property_1">
                                    <option value=''>Select an option</option>
                                    @foreach($properties as $p=>$property)

                                    <option value="{{$property->property_id}}">{{$property->property->area.' , '.$property->property->location}}</option>
                                    @endforeach
                                </select>



                                @endif

                            </div>
                        </div>

                        @if($type!='lc')
                        <div class="form-group">
                            <label class="control-label">Meter No </label>
                            <div >

                                <input type="text" name="property" value="" placeholder="Meter No"  class="form-control"/>
                            </div></div> @endif

                        <div class="form-group">
                            <label class="control-label">Amount to be Paid</label>
                            <div >
                                <input type="text" name="amount" value="" placeholder="Amount"  class="form-control"/>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Select Payment Option</label>
                            <div >
                                <select class="form-control" name="payment_option">
                                    <option>Select an Option</option>
                                    @foreach($wallet as $wal)
                                    <option value="{{$wal->id}}">{{$wal->mobile_provider}} = {{$wal->wallet_no}}</option>

                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Would you like to make this payment')">Make Payment</button>
                        </div>
                        <input type="hidden" value="{{$type}}" name="bill_type" />
                        {{ Form::close() }}
                    </div>

              

            
        </div>
    </div>   







@stop
@section('script')

@stop