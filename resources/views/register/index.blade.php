<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!-- Bootstrap -->
    <link href="{{ asset('theme/css/bootstrap-4.0.0.css') }}" rel="stylesheet">

  </head>
  <body>
    @include ('partials.navbar')
	  
  	<br>
	<br>

    <div class="jumbotron jumbotron-fluid text-center">
       <h1 class="display-4">Register</h1>
    </div>
    <div class="container">
       <div class="row text-center">
          <div class="col-lg-6 offset-lg-3"><strong>Please fill this bad boi up so I can remember your URL(s)</strong>. </div>
       </div>
       <br>
       <hr>
      	
	   <form method="POST" action="{{ route('Register.submit') }}">
           {{ csrf_field() }}
		  <div class="form-group">
		    <label for="inputEmail">Email address</label>
		    <input type="email" class="form-control" id="inputEmail" placeholder="Enter email" name="email">
		    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
		  <div class="form-group">
		    <label for="inputPassword">Password</label>
		    <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
            <small class="form-text text-muted">Your password must be more than 4 Characters.</small>
	     </div>
		  <button type="submit" class="btn btn-primary">Register</button>
	  </form>
	  <br>
      <hr>
      <div class="row">
          <div class="text-center col-lg-6 offset-lg-3">
              <p>Copyright &copy; 2019 &middot; All Rights Reserved &middot; <a href="https://github.com/InspectorGadget" >My Website</a>. <br> A Project by InspectorGadget</p>
          </div>
       </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="{{ asset('theme/js/jquery-3.2.1.min.js') }}"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed --> 
    <script src="{{ asset('theme/js/popper.min.js') }}"></script>
    <script src="{{ asset('theme/js/bootstrap-4.0.0.js') }}"></script>
  </body>
</html>
