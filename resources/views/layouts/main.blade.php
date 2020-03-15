<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>My Contact</title>

    <!-- Bootstrap -->
    <link href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/jasny-bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{ url('https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js') }}"></script>
    <script src="{{ url('https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script>
    <![endif]-->
</head>

<body>
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand text-uppercase" href="index.html">
            My contact
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- /.navbar-header -->
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <div class="navbar-nav ml-auto">
                <div class="nav-item">

                    <form action="{{ route('contacts.index') }}" class="navbar-left mr-2">
                        <div class="input-group">
                            <input type="text" class="form-control" name="term" placeholder="Search term..." value="{{ Request::get('term') }}">
                            <span class="input-group-btn">
                                <button class="btn btn-outline-secondary" type="submit">
                                    <span><i class="fa fa-search" aria-hidden="true"></i></span>
                                </button>
	                        </span>
                        </div>
                    </form>

                </div>

                <div class="nav-item">
                    <a href="{{ route('contacts.create') }}" class="btn btn-outline-secondary">
                        <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                        Add Contact
                    </a>
                </div>
            </div>
        </div>

    </div>
</nav>

<!-- content -->
<main class="pt-5">
    <div class="container">
        <div class="row">

            @include('layouts._sidebar')

            <div class="col-md-9">
                @include('layouts._messages')
                @yield('content')
            </div>

        </div>
    </div>
</main>

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jasny-bootstrap.min.js') }}"></script>
<script>
    $("#add-new-group").hide();
    $('#add-group-btn').click(function () {
        $("#add-new-group").slideToggle(function() {
            $('#new_group').focus();
        });
        return false;
    });
</script>
</body>
</html>
