@extends('layout.default')

@section('title')
Property Assignment
@stop

@section('content')

<div class="page-content">
    <div class="col-xlg-6 col-md-6">

        <div class="" style="height:50%;">
            <h3>Properties </h3>
            <table class="table table-hover dataTable table-striped width-full">

              
                <tr>
                    <td>Property No</td>
                    <td>{{$property->property_id}}</td>
                </tr> 
                <tr>
                    <td>Type</td>
                    <td>{{$property->property_type}}</td>
                </tr> 
                <tr>
                    <td>Type of Use</td>
                    <td>{{$property->type_of_use}}</td> 
                </tr> 
                <tr>
                    <td>Region</td>
                    <td>{{$property->region}}</td> 
                </tr> 
                <tr>

                    <td>District</td>
                    <td>{{$property->district}}</td> 
                </tr> 
                <tr>
                    <td>Location</td>
                    <td>{{$property->location}}</td> 
                </tr> 
                <tr>
                    <td>Directions</td>
                    <td>{{$property->area}}</td> 
                </tr> 
                <tr>
                    <td>Assignment Status</td>
                    <td>{{$property->assignment_status}}</td> 
                </tr> 
                <tr>
                    <td>Current Assignement</td>
                    <td> <?php ($property->userActiveProperty) ?>{{isset($property->userActiveProperty) ? $property->userActiveProperty->userDetail->getName(): ''}}</td>
                </tr>


            </table>
        </div>
    </div>
    <div class="col-xlg-6 col-md-6">

<h3>Assignments </h3>
            <a href="{{URL::to('propertyassign')}}/{{$property->id}}" class="btn btn-primary">Assign New</a>
            <table class="table table-hover dataTable table-striped width-full">
               <tr>
                <th>Name</th>
                <th>Date Assigned</th>
                <th>Status</th>
            </tr>
            @foreach($property->userProperty as $p=>$assignment)
             <tr>
                <td>{{$assignment->userDetail->getName()}}</td>
                <td>{{date('D M d,Y',strtotime($assignment->created_at))}}</td>
                <td>{{$assignment->status}}</td>
            </tr>
            @endforeach
            </table>


         {{ Form::open(array('url'=> 'propertyassign','method'=>'post')) }}
            <div class="search"><input type="text" name="q" id="q" placeholder="User Search to Assign Property To" class='form-control' style='width:75%;float:left' /> <input type="button" class='btn btn-success' id="btnsearch" value="Search User"/></div>
            <div id="searchuser">
            </div>
          <input type="submit" id="" value="Assign User" class="btn btn-info"/>
            <input type="hidden" name="property" value="{{$property->id}}" />
        </form>
    </div>
</div>

@stop
@section('script')
<script type="text/javascript">
    var url = "{{URL::to('propertysearch')}}?q=";
    $("#btnsearch").click(function () {
       
        $.ajax({url: url + $("#q").val(), success: function (result) {

                $("#searchuser").html(result);
            }});
    });
</script>

@stop