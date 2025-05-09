{{-- resources/views/backend/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    @include('backend.includes.head')
    @stack('styles')
</head>

<body>

    @auth
        @include('backend.includes.sidebar')
    @endauth
    <div class="d-flex">
        <!-- Page content starts here -->
        <div style="margin-left: 220px; width: 100%;">
            @yield('content')
        </div>
    </div>
    @include('backend.includes.script')
</body>

</html>
