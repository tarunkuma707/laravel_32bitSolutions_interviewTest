<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @include('showloggedin')
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
    <form action={{ route('updatepostuser',$updateId->id) }} method="POST">
        @csrf
        <label for="username">{{ $updateId->name }}</label>
        <label for="useremail">{{ $updateId->useremail }}</label>
        <label for="password">User Passowrd</label>
        <input type="password" name="password" required='required' value={{ old('password') }} >
        <label for="password">Confirm Passowrd</label>
        <input type="password" name="password_confirmation" required='required' value={{ old('password_confirmation') }} >
        <button type="submit">Update</button>
    </form>
</body>
</html>
