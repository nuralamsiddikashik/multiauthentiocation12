{{-- <h1>Hello Admin Login Panel ! </h1>

@if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
    @endif

@if(session('success'))
    <div>
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div>
        {{ session('error') }}
    </div>  
    
@endif

<form method="POST" action="{{ route('admin.login.submit') }}">
    @csrf
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
    </div>
    <div>
        <button type="submit">Login</button>
    </div>
</form>

<a href="{{ route('home') }}">Home</a> | <a href="{{ route('login') }}">User Login</a> | <a href="{{ route('register') }}">User Register</a> --}}