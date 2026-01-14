<!DOCTYPE html>
<html>
<head>
    <title>@yield('title') - My Website</title>
  <link rel="stylesheet" href="{{ asset('assets/css/frontend.css') }}">

</head>
<body>

@include('frontend.partials.header')
@include('frontend.partials.navbar')

<main>
    @yield('content')
</main>

@include('frontend.partials.footer')

</body>
</html>
