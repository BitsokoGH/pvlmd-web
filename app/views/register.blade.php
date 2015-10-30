@extends('layout.noauth')

@section('title')
Register
@stop

@section('content')


<!-- Page -->
<div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
     data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle">
        <div class="panel panel-bordered">
            <div class="panel-body">
                <div class="brand">
                    <img class="brand-img" src="../assets/images/logo.png" alt="...">
                    <h2 class="brand-text">Lands Commission</h2>
                </div>
              @include('msg')
                <form method="post" role="form">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="sr-only" for="inputFname">First Name</label>
                            <input type="text" class="form-control" value="{{Input::old('firstname')}}" id="inputFname" name="firstname" placeholder="First Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="sr-only" for="inputLname">Last Name</label>
                            <input type="text" class="form-control" id="inputLname" name="lastname" placeholder="Last Name"  value="{{Input::old('lstname')}}" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="inputPhone">Phone Number</label>
                        <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="Phone Number"  value="{{Input::old('phone')}}" >
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="inputEmail">Email</label>
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email"  value="{{Input::old('email')}}" >
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="inputPassword">Password</label>
                        <input type="password" class="form-control" id="inputPassword" name="password"
                               placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="inputPasswordCheck">Retype Password</label>
                        <input type="password" class="form-control" id="inputPasswordCheck" name="confirmpassword"
                               placeholder="Confirm Password">
                    </div>
                    <button type="submit" class="btn btn-primary pull-left">Register</button>
                </form>
            </div>
            <div class="panel-footer"><p>Already have an account?</p>
                <a href="{{URL::to('login')}}" class="btn btn-primary ">Login</a></div>
        </div>





        <footer class="page-copyright">

            <p>© Copyright Bitsoko 2015. All right reserved.</p>


        </footer>
    </div>
</div>
<!-- End Page -->
@end