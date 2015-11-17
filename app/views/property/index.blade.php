@extends('layout.default')

@section('title')
Property
@stop

@section('content')

<div class="page-content">
    <div class="row height-full">


    </div>


    <div>
        <div class="" style="height:50%;">
            <h3>Properties </h3>
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
                    <td>Property</td>
                    <td>Action</td>
                </tr>
                @foreach($properties as $p=>$property)
                <tr>
                    <td>{{$property->property_id}}</td>
                    <td>{{$property->property_type}}</td>
                    <td>{{$property->type_of_use}}</td>
                    <td>{{$property->region}}</td>
                    <td>{{$property->district}}</td>
                    <td>{{$property->location}}</td>
                    <td>{{$property->area}}</td>
                    <td>{{$property->assignment_status}}</td>
                    <td> <?php (@$property->userActiveProperty) ?>{{isset($property->userActiveProperty) ? $property->userActiveProperty->userDetail->getName(): ''}}</td>
                    <td><a href="{{URL::to('property/')."/".$property->id}}" class="label label-info">View</a></td>
                </tr>
                @endforeach
            </table>
        </div>

    </div></div>

@stop
@section('script')

@stop