@extends('layout.noauth')

@section('title')
Confirm Registration
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
                
                <form method="post">
                  <div class="forgot-password">
                  <h4>Thanks for Registering {{$user->firstname." ".$user->lastname}}</h4>
                  @include('msg')
                <p>An email had been sent to you.  Please follow the instructions and complete the rest of the process. A token has been sent to your phone<p>
                  <div class="form-group">
                        <label class="sr-only" for="inputPhone">Phone Token</label>
                        <input type="text" class="form-control" id="inputPhone" name="ptoken" placeholder="4 Digit Token">
                    </div>
                  <button type="submit" class="btn btn-primary pull-right">Confirm Password</button>
                  <input type="hidden" name="u" value="{{$user->id}}" />
                  <input type="hidden" name="t" value="{{$token->id}}" />
                  </div>
       </form>
            </div>
               <div class="panel-footer">
                   <p>Already have an account?</p>
            <a href="{{URL::to('login')}}" class="btn btn-primary ">Login</a>
               </div>
          </div>
      
      
      
      
      
      <footer class="page-copyright">
        
        <p>© Copyright Bitsoko {{date("Y")}}. All right reserved.</p>
        
        
      </footer>
    </div>
  </div>
  <!-- End Page -->

@end