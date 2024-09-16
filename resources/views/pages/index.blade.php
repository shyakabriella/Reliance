@extends('layouts.main')

@section('content')

<body>
    <div class="container">
        <div class="images-section">
            <!-- Placeholder for Cleaning Supplies Image -->
            <img src="img/cln.png" alt="Cleaning Supplies">
            <!-- Calendar Icons (Represented as simple blocks for demonstration) -->
            <div class="calendar-icons">
                <div class="icon">May 15</div>
                <div class="icon">Apr 14</div>
                <div class="icon">May 25</div>
                <div class="icon">! !</div>
                <div class="icon">Jan 1</div>
            </div>
        </div>
        <div class="login-section">
            <div class="header">
                <h4>Cleaning Schedule Management System</h4>
            </div>
            <div class="login-form">
                <h2>Login</h2>
                <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf
                    <div class="input-group">
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="input-group">
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="remember-me">
                        <input type="checkbox" id="rememberMe">
                        <label for="rememberMe">Remember me</label>
                    </div>
                    <button type="submit">Login</button>
                    <a href="#">Forget Password?</a>
                </form>
            </div>
        </div>
    </div>
</body>

@endsection