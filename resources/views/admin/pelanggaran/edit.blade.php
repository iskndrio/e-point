<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 70px 0px;
        }
        table,
        th,
        td {
            border: 1px solid;
        }
    </style>
</head>
<body>
    <h1>edit pelanggaran</h1>
    <a href="{{ route('pelanggaran.index') }}">Kembali</a><br>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif

    <form action="{{ route('pelanggaran.update', $pelanggaran->id) }}" method="post">
        @csrf 
        @method('PUT')
        <h2>data pelanggaran</h2>
        <label for="">Jenis Pelanggaran</label><br>
        <textarea name="jenis" id="jenis" rows="7" cols="50" value="{{ old('jenis') }}">{{ $pelanggaran->jenis }}</textarea>
        <br>

        <br>
        <label for="">Konsekuensi</label><br>
        <textarea name="konsekuensi" id="konsekuensi" rows="7" cols="50" value="{{ old('konsekuensi') }}">{{ $pelanggaran->konsekuensi }}</textarea>
        <br>

        <br>
        <label for="">Poin</label><br>
        <input type="text" name="poin" id="poin" value="{{ $pelanggaran->poin }}">

       <button type="submit">SIMPAN DATA</button>
    </form>
</body>
</html>