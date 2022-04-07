<h1>Register</h1>

<form action="register" method = "post">
    @csrf
    <div>Firstname</div>
    <input type="text" name = "firstname" placeholder = "firstname"> <br> <br>
    <div>lastname</div>
    <input type="text" name = "lastname" placeholder = "Lastname"> <br> <br>
    <div>username</div>
    <input type="text" name = "username" placeholder = "Username"> <br> <br>
    <div>email</div>
    <input type="text" name = "email" placeholder = "Email"> <br> <br>
    <div>password</div>
    <input type="text" name = "password" placeholder = "password"> <br> <br>

    <button type="submit">Register</button>
</form>