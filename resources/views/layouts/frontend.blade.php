<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Template</title>
    <link rel="stylesheet" href="{{ asset('assets/css/frontend.css') }}">
</head>
<body>
    <!-- Home Page -->
    <div id="home" class="page active">
        @include('frontend.partials.header')
        <main>
            <div class="main-content">
                @yield('content')
            </div>
        </main>
        @include('frontend.partials.footer')
    </div>   
</body>
</html>