<!DOCTYPE html>
<html lang="en">
<head>
    @include('backend.layouts.meta')
    <title>Online Course</title>
    @include('backend.layouts.links')
    @yield('styles')
</head>
<body class="vertical-layout">
    <div id="containerbar">
            @include('backend.layouts.sidebar')

            @include('backend.layouts.topbar')
            <div class="col-lg-12 mt-2">
                @include('backend.layouts.alert')
            </div>
            @yield('content')

            <div class="footerbar">
                <footer class="footer">
                    <p class="mb-0">© 2020 Laravel - All Rights Reserved.</p>
                </footer>
            </div>
        </div>
    </div>
    @include('backend.layouts.scripts')
    @yield('scripts')
</body>
</html>
