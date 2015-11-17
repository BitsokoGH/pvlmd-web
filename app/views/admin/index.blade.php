@extends('layout.default')

@section('title')
Admin User View
@stop

@section('content')

                <div id="wallet-table">
                    <div class="panel">
                        <div class="panel-heading">

                            <h3 class="panel-title">Admin Users List</h3>
                            <div class="panel-actions">
                                <a type="button" href="admin/create" class="btn btn-primary btn-sm pull-right" id="add-new-admin-user">
                                    Add New Admin User
                                </a>
                            </div>

                        </div>
                        <div class="panel-body">
                            <table class="table table-hover  table-striped width-full">
                                <thead>
                                    <tr>
                                        <th>Fullname</th>
                                        <th>Email</th>
										<th>Phone Number</th>
                                        <th>Status</th>
										<td>&nbsp;</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($users as $k=>$user)
                                    <tr>
                                        <td>{{$user->firstname.' '.$user->lastname}}</td>
                                        <td>{{$user->email}}</td>
										<td>{{$user->phone}}</td>
                                        <td>{{$user->status}}</td>
										<td><a href="admin/{{$user->id}}/edit" class="btn btn-primary btn-sm pull-right" >Edit</a></td>										
                                    </tr>
                                    @endforeach

                             </tbody>
                            </table>
                        </div>
                    </div>   
                </div>
@stop