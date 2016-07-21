@extends('layout/user')


@section('content')

@if (count($errors) > 0)  
        <ul style="margin-top: 0px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/auth/login">
    {!! csrf_field() !!}

    <div>
        Username
        <input type="text" name="name" value="{{ old('name') }}">
    </div>

    <div>
        Password
        <input type="password" name="password" id="password">
    </div>

    <div>
        <button type="submit">Login</button>
    </div>
</form>
@endsection