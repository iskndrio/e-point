<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Akun</title>
</head>
<body>
    <h1>Register</h1>
    <br><br>

    <a href="{{ route('akun.index') }}">Kembali</a>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $errors)
            <li>{{ $errors }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('akun.store') }}" method="POST">

    @csrf 
    <label>Nama Lengkap</label><br>
    <input type="text" name="name" id="name" value="{{ old('name') }}"><br>

    <br>
    <label>Email Address</label><br>
    <input type="email" name="email" id="email" value="{{ old('email') }}"><br>

    <br>
    <label>Password</label><br>
    <input type="password" name="password" id="password"><br>

    <br>
    <label for="password_confirmation" class="col-md-label text-md-end text-start">Confirm Password</label>
    <div class="col-md-6">
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
    </div>

    <label>Hak Akses</label><br>
    <select name="usertype" required>
        <option value="">Pilih Hak Akses</option>
        <option value="admin">Admin</option>
        <option value="ptk">PTK</option>
    </select>
    <br></br>

    <input type="submit" value="Register">
    </form>
</body>
</html>