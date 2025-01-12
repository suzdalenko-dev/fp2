@extends('layout') <!-- Extend the base layout -->

@section('title', 'Login Page') <!-- Define the title -->

@section('content')
<div class="wrapper">
    <div class="login">
        <h2>Login</h2>
    </div>
    <form action="login.php" method="POST" class="login_form">
        <input class="input" name="email" type="text" placeholder="Usuario">
        <input class="input" name="pass" type="text" placeholder="Contraseña">
        <input class="submit" type="submit" value="Login" name="login">
        <div style="color:red;">
            {{ $message }}
        </div>
    </form>
    <div>
        <p>usuario: Alexey</p>
        <p>passowrd: Password123</p>
    </div>
</div>
@endsection