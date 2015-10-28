@extends('layout.default')

@section('title')
Welcome  {{$user->lastname}} {{$user->firstname}}
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
                
               <form>
                  <div class="forgot-password">
                  <h4>Welcome {{$user->firstname}} {{$user->lastname}}</h4>
                <p>You have just login watch for more exciting things {{$user->role}}<p>
                  </div>
       </form>
            </div>
               <div class="panel-footer">
            <a href="{{URL::to('logout')}}" class="btn btn-primary ">Logout</a>
               </div>
          </div>
      
      
      
      
      
      <footer class="page-copyright">
        
        <p>© Copyright Bitsoko 2015. All right reserved.</p>
        
        
      </footer>
    </div>
  </div>
  <!-- End Page -->

@end