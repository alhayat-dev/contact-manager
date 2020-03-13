
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>My Contact</title>

    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
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
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="form.html" class="btn btn-outline-primary">Add New</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- content -->
<main class="pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">

                    @php
                        $selected_group = \Request::get('group_id')
                    @endphp
                    <a href="{{ route('contacts.index') }}"
                       class="{{ !$selected_group ? 'active' : '' }} list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        All Contact <span class="badge badge-warning badge-pill">{{ \App\Contact::count() }}</span>
                    </a>

                    @foreach(App\Group::all() as $group)
                        <a href="{{ route('contacts.index', ['group_id' => $group->id]) }}"
                           class="{{ $selected_group == $group->id ? 'active' : '' }} list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            {{ $group->name }}
                            <span class="badge badge-pill badge-warning">
                                {{ $group->contacts->count() }}
                            </span>
                        </a>
                    @endforeach

                </div>
            </div><!-- /.col-md-3 -->

            <div class="col-md-9">
                @yield('content')
            </div>
        </div>
    </div>
</main>

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>
