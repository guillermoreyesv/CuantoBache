<!doctype html>
<html>
    <head>
        @include('includes.head')
    </head>
    <body>
        <header>
            @include('includes.header')
        </header>
            <div id="main" class="row">
                <div class="col">
                    @yield('content')
                </div>
            </div>
        <footer>
            @include('includes.footer')
        </footer>
    </body>
</html>