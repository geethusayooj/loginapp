<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
</head>
<body>
<h2>Sign Up</h2>
@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('signup.submit') }}">
    @csrf
    <input type="text" name="name" placeholder="Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Sign Up</button>
</form>

<a href="{{ route('home') }}">Back to Home</a>
</body>
</html>
