<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@extends('auth.layouts')

@section('content')
<h1 class="text-center">Register</h1>
<br><br>
<form action="{{ route('store') }}" method="POST">
    <div class="text-center align-center">
    @csrf
    <label>Nama Lengkap</label><br>
    <input type="text" id="name" name="ngaran" value="{{ old('name') }}" class="form-control" style="width: 40%"><br>
    
    @if ($errors->has('name'))
    <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif

    <br>
    <label>Email Address</label><br>
    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" style="width: 40%"><br>

    @if ($errors->has('email'))
    <span class="text-danger">{{ $errors->first('email') }}</span>
    @endif

    <br>
    <label>Password</label><br>
    <input type="password" id="password" name="password" class="form-control" style="width: 40%"><br>

    @if ($errors->has('password')) 
    <span class="text-danger">{{ $errors->first('password') }}</span>
    @endif

    <br>
    <label for="password_confirmation">Confirm Password</label><br>
    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" style="width: 40%"><br>
    </div>
    
    <div class="d-flex flex-column mb-3 align-items-center">
    <div class="p-2">Have an account?<a href="{{ route('login') }}">Login</a></div>
    <div class="p-2"><input type="submit" value="Register" class="btn btn-primary"></div>
    </div>
</form>
@endsection