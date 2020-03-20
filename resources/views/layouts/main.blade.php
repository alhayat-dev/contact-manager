@include('partials.header')

@include('partials.navbar')
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

@include('partials.footer')
