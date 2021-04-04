@include('frontend.layout.header')
@include('frontend.layout.nav')


<main id="main">
    @include('frontend.layout.message')

    @yield('content')

</main><!-- End #main -->


@include('frontend.layout.footer')
