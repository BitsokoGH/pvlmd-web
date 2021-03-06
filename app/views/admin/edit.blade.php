@extends('layout.default')
@section('content')
 {{ Form::model($user, array('method' => 'PATCH', 'route' => array('admin.update', $user->id))) }}
                        <div class="panel-body">
                            <form class="validate form-horizontal" autocomplete="off">

							
                                <div class="form-group">
                                    <label class="control-label col-md-4">User Name</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="username" id="username" placeHolder="Eg. yourname@domain.com"
                                               value="{{$user->username}}" /> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">First Name</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="firstname" id="firstname" placeHolder="Eg. Adam"
                                               value="{{$user->firstname}}" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Last Name</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="lastname" id="lastname" placeHolder="Eg. Eve"
                                               value="{{$user->lastname}}" /> 
                                    </div>
                                </div>	
                                <div class="form-group">
                                    <label class="control-label col-md-4">Email</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="email" id="email" placeHolder="Eg. yourname@domain.com"
                                               value="{{$user->email}}" /> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Phone</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="phone" id="phone" placeHolder="Eg. 0208530002"
                                               value="{{$user->phone}}" /> 
                                    </div>
                                </div>
							

                                <div class="form-group">
                                    <label class="control-label col-md-4">Select Department</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="mobile_provider">
                                            <option>Select an option</option>
                                            <option>Finance</option>
                                            <option>Legal</option>
											<option>Aministration</option>
                                        </select>

                                    </div>
                                </div>
								<br /><br /><br />
								<br><br><br>
								<br><br><br>
                                <div class="form-group">
                                    <label class="control-label col-md-4"></label>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">Update User Account</button>
                                    </div>
                                </div>
                            </form>
                        </div>

               
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