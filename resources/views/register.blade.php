<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <h1>Registration</h1>

    <form action="/login" method="POST">
        @csrf
        @error('not_reg')
            <div style="color:red;">{{$message}}</div>
        @enderror

        @error('invalid')
            <div style="color:red;">{{$message}}</div>
        @enderror

        <label for="name">Name: </label>
        <input type="text" name="name"> <br>
        @error('name')
            <div style="color:red;">{{$message}}</div>
        @enderror
        <label for="email">Email: </label>
        <input type="text" name="email"> <br>
        @error('email')
            <div style="color:red;">{{$message}}</div>
        @enderror
        <label for="password">Password: </label>
        <input type="password" name="password"> <br>
        @error('password')
            <div style="color:red;">{{$message}}</div>
        @enderror

        <input type="submit" value="Register">
    </form>
</body>
</html>
