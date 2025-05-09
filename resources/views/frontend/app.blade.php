<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.includes.head')
    @stack('styles') <!-- Add this here -->
</head>

<body class="dark-scheme">
    <div id="wrapper">
            @include('frontend.includes.header')
            <div style="background-color:white;" id="content" class="no-bottom no-top">
            @yield('content')
        </div>
    @include('frontend.includes.footer')
    </div>
    @include('frontend.includes.scripts')
</body>
</html>