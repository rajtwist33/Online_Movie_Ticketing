<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OMT</title>
    @include('backend.layouts.css.css')

    @yield('style')
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('backend.layouts.navbar')
        @include('backend.layouts.body')
        @include('backend.layouts.controlsidebar')
        @include('backend.layouts.footer')
    </div>
    {{-- Javascript File --}}
    @include('backend.layouts.js.js')
    @yield('script')
</body>
</html>
