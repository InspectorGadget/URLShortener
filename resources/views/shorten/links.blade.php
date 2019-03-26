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

<br>
<br>

<div class="jumbotron jumbotron-fluid text-center">
    <h1 class="display-4">My Links ({{ count($links) }})</h1>
</div>
<div class="container">
    <div class="row text-center">
        <div class="col-lg-6 offset-lg-3"><strong>You may delete and edit your links here</strong>. </div>
    </div>
    <br>
    <hr class="my-4">

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Link</th>
            <th scope="col">Redirect</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @if (count($links) > 0)
            @foreach ($links as $link)
                <tr>
                    <td> {{ $link->link }} </td>
                    <td> <a href="{{ "/r/" . $link->code }}">Click me</a> </td>
                    <td> <a class="" href="" data-toggle="modal" data-target="#editModal"> Edit </a> / <a href="{{ route('Link.delete', ['id' => $link->ID]) }}">Delete</a> </td>
                </tr>

                <!-- The Modal -->
                <div class="modal fade" id="editModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Edit your Link</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form method="POST" action="{{ route('Link.edit', ['id' => $link->ID]) }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="inputOrigin">Origin (Editable)</label>
                                        <input type="text" class="form-control" id="inputOrigin" name="link" value="{{ $link->link }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="generatedCode">Generated Code (Redirect)</label>
                                        <input type="text" class="form-control" id="generatedCode" value="{{ \Illuminate\Support\Facades\URL::route('Home') . "/r/" . $link->code }}" disabled>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <tr>
                <td> No Data </td>
                <td> No Data </td>
                <td> No Data </td>
            </tr>
        @endif
        </tbody>
    </table>

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
