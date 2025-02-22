<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@extends('auth.layouts')

@section('content')

<h1>Login</h1>
<br><br>
<form action="{{ route('authenticate') }}" method="post">
      @csrf
      <label>Email Addres</label><br>
      <input type="email" id="email" name="email" value="{{ old('email') }}"><br><br>
      <label>Password</label><br>
      <input type="password" id="password" name="password"><br><br>
      <input type="submit" value="Login">
</form>

@endsection