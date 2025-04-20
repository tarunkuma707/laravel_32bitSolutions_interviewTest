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
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <form action="/loginpost" method="POST">
        @csrf
        <label for="useremail">User Email</label>
        <input type="email" name="email" required='required' value={{ old('useremail') }} >
        <label for="password">User Passowrd</label>
        <input type="password" name="password" required='required' value={{ old('password') }} >
        <button type="submit">Login</button>
    </form>
</body>
</html>
