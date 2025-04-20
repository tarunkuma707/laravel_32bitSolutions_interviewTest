<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>

        @endforeach
    </ul>
    @endif
   @if (session('message'))
        <div class="alert">{{ session('message') }}</div>
    @endif
    <form action="/addpostuser" method="POST">
        @csrf
        <label for="username">User Name</label>
        <input type="text" name="username" value={{ old('username') }} >
        <label for="useremail">User Email</label>
        <input type="email" name="useremail" value={{ old('useremail') }} >
        <label for="password">User Passowrd</label>
        <input type="password" name="password" value={{ old('password') }} >
        <label for="password">Confirm Passowrd</label>
        <input type="password" name="password_confirmation" value={{ old('password_confirmation') }} >
        <button type="submit">Add</button>
    </form>
</body>
</html>
