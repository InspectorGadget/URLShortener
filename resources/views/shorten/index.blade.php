<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!-- Bootstrap -->
    <link href="{{ asset('theme/css/bootstrap-4.0.0.css') }}" rel="stylesheet">

    <?php
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
    ?>

  </head>
  <body>
  @include ('partials.navbar')
	  
  <br><br>

    <div class="jumbotron jumbotron-fluid text-center">
       <h1 class="display-4">URL Shortener</h1>
       <p class="lead">Easily shorten your URL with one click!</p>
       <hr class="my-4">
       <p class="lead">
          <button class="btn btn-success btn-lg" role="button" onclick="showForm()" id="formToggle">Shorten now!</button>
       </p>
		<div class="container col-md-6 col-12" id="inputForm" hidden>
			<form method="POST" action="{{ route('Shorten.submit') }}">
                {{ csrf_field() }}
			  <div class="form-group">
				<label for="inputURL">URL</label>
				<input type="text" class="form-control" id="inputURL" placeholder="Paste URL" name="link">
			   </div>
			  <button type="submit" class="btn btn-primary">Submit</button>
		  </form>
		</div>
    </div>
    
    <div class="container">
       <div class="row text-center">
          <div class="col-lg-6 offset-lg-3"><strong>I do not take responsibility for any misuse of this System. This was made for Educational purpose and shall remain Open Sourced.</strong></div>
       </div>
       <br>


       <br>
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
    <script src="{{ asset('theme/js/custom.js') }}"></script>
  </body>
</html>
