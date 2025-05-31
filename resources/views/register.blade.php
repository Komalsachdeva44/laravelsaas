<!DOCTYPE html>
<html>
<head>
    <title>Tenant Registration</title>
</head>
<body>
    <h1>Register Your Subdomain</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('register.submit') }}">
        @csrf
        <div>
            <label>Name:</label><br>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name') <span style="color:red;">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Email:</label><br>
            <input type="email" name="email" value="{{ old('email') }}">
            @error('email') <span style="color:red;">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Password:</label><br>
            <input type="password" name="password">
            @error('password') <span style="color:red;">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Confirm Password:</label><br>
            <input type="password" name="password_confirmation">
        </div>

        <div>
            <label>Subdomain:</label><br>
            <input type="text" name="subdomain" value="{{ old('subdomain') }}">
            <small>Example: <strong>yourname</strong>.localhost</small><br>
            @error('subdomain') <span style="color:red;">{{ $message }}</span> @enderror
        </div>

        <button type="submit">Register</button>
    </form>
</body>
</html>
