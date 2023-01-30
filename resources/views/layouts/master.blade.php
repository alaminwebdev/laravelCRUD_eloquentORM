<!doctype html>
<html lang="en">
@include('partials.head')

<body>
    <main>
        @include('partials.nav')
        <div class="container pt-5">
            <div class="row">
                @if (session()->has('success'))
                    <div class="col-12">
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
        @include('partials.footer')
    </main>
</body>
</html>
