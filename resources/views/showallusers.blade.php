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
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    @if(count($users))
        @foreach($users as $user)
            <h1>{{ $user->id }} &nbsp; {{ $user->name }}</h1>
            <a href={{ route('update',$user->id) }}>Update</a>
            <form action={{ route('deleteuser',$user->id ) }} method="POST">
                @csrf
                <button type="submit" onclick="return confirm('Do you want to delte this record')">Delete</button>
            </form>
        @endforeach
        {{ $users->links() }}
    @else
    <h1>No User Data</h1>
    @endif
</body>
</html>
