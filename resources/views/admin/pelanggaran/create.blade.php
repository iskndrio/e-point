<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tambah Pelanggaran</h1>
    <br><br>

    <a href="{{ route('pelanggaran.index') }}">Kembali</a><br><br>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('pelanggaran.store') }}" method="post">
        @csrf 
        <label for="">Jenis Pelanggaran</label><br>
        <textarea name="jenis" id="jenis" rows="7" cols="50" value="{{ old('jenis') }}"></textarea>
        <br>

        <br>
        <label for="">Konsekuensi</label><br>
        <textarea name="konsekuensi" id="konsekuensi" rows="7" cols="50" value="{{ old('konsekuensi') }}"></textarea>
        <br>

        <br>
        <label for="">Poin</label><br>
        <input type="text" name="poin" id="poin">

        <input type="submit" value="Register">
    </form>
</body>
</html>