@extends('layout.noauth')

@section('title')
Set Password
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
                    <form method="post" action="set-password">
                        @include('msg')
                        <div class="form-group">
                            <label class="sr-only" for="inputEmail">Email</label>
                            <input type="email" class="form-control" readonly="readonly" id="inputEmail" name="email" placeholder="Email" value="{{$user->getName()}}">
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
                        <button type="submit" class="btn btn-primary pull-left">Set Password</button>
   <input type="hidden" name="u" value="{{$user->id}}" />
            <input type="hidden" name="t" value="{{$token->id}}" />
                </form> 
                </div>   
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
