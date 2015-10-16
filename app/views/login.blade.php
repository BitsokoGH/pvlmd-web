@extends('layout.noauth')

@section('title')
Login
@stop

@section('content')

  <div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
  data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle">
	   <div class="panel panel-bordered">
            <div class="panel-body">
             <div class="brand">
        <img class="brand-img" src="assets/images/logo.png" alt="...">
        <h2 class="brand-text">Lands Commission</h2>
      </div>
              <form method="post" action="login.html">
        
        <div class="form-group">
          <label class="sr-only" for="inputEmail">Email</label>
          <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
        </div>
        <div class="form-group">
          <label class="sr-only" for="inputPassword">Password</label>
          <input type="password" class="form-control" id="inputPassword" name="password"
          placeholder="Password">
        </div>
        <div class="form-group clearfix">
          <div class="checkbox-custom checkbox-inline pull-left">
            <input type="checkbox" id="inputCheckbox" name="checkbox">
            <label for="inputCheckbox">Remember me</label>
          </div>
          <a class="pull-right" href="{{URL::to('forgot-password')}}">Forgot password?</a>
        </div>
        <button type="submit" class="btn btn-primary pull-right">Login</button>
      </form>
            </div>
            <div class="panel-footer"><p>Don’t have an account?</p>
            <a href="{{URL::to('register')}}" class="btn btn-primary ">Create Account</a></div>
          </div>
      
      
      
      
      
      <footer class="page-copyright">
        
        <p>© Copyright Bitsoko 2015. All right reserved.</p>
        
        
      </footer>
    </div>
  </div>
@end