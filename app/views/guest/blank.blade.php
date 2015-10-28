@extends('layout.noauth')

@section('title')
{{$title}}
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
                  <h4>{{$title}}</h4>
                  @include('msg')
                <p>{{$content}}<p>
                  </div>
       </form>
            </div>
               <div class="panel-footer">
                   <p>Already Registered</p>
            <a href="{{URL::to('login')}}" class="btn btn-primary ">Login</a>
               </div>
          </div>
      
      
      
      
      
      <footer class="page-copyright">
        
        <p>© Copyright Bitsoko 2015. All right reserved.</p>
        
        
      </footer>
    </div>
  </div>
  <!-- End Page -->

@end