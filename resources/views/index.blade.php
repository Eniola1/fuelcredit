<h1>Login</h1>

<form action="login" method = "post">
    @csrf
    <div>Username</div>
    <input type="text" name = "username" placeholder = "username"> <br> <br>
    <div>Password</div>
    <input type="text" name = "password" placeholder = "password"> <br> <br>

    <a href="{{url('/register')}}">Register</a><br><br>

    <button type="submit">Login</button>
</form>