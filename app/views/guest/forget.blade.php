@extends('layout.noauth')

@section('title')
Forgotten Password
@stop

@section('content')

  
  <!-- Page -->
  <div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
  data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle">
	   <div class="panel panel-bordered">
            <div class="panel-body">
             <div class="brand">
        <img class="brand-img" src="assets/images/logo.png" alt="...">
        <h2 class="brand-text">Lands Commission</h2>
      </div>
                
              <form method="post" role="form">
                  <div class="forgot-password">
                  <h4>Forgot Password ?</h4>
                  @include('msg')
                <p>Enter your email address or phone number and we'll send you instructions.</p>
                  </div>
        <div class="form-group">
          <input type="text" class="form-control" id="inputEmail" name="username" placeholder="Email Address / Phone Number">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary pull-left ">Recover Password</button>
        </div>
      </form>
            </div>
               <div class="panel-footer">
                   <p>Already have an account?</p>
            <a href="{{URL::to('login')}}" class="btn btn-primary ">Login</a>
               
                   
               </div>
          </div>
      
      
      
      
      
      <footer class="page-copyright">
        
        <p>© Copyright Bitsoko GH 2015. All right reserved.</p>
        
        
      </footer>
    </div>
  </div>
  <!-- End Page -->
@end
