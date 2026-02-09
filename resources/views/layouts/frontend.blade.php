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

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 @if (session('toast'))
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });

    Toast.fire({
        icon: "{{ session('toast.type') }}",
        title: "{{ session('toast.message') }}"
    });
</script>
@endif
</body>
</html>