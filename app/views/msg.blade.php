
 @if(Session::has('flash_error'))
                <div class="alert alert-danger">
                    <h4>Error Failed!</h4>
                    {{ HTML::ul($errors->all()) }}
                </div>
                @endif
                @if (Session::has('error_message'))
                <div class="alert alert-danger">{{ Session::get('error_message') }}</div>
                @endif
                @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif