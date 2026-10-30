<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
</head>
<body>
    <h1>Edit Mahasiswa</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/mahasiswa/' . $mahasiswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label for="nama">Nama:</label><br>
            <input type="text" id="nama" name="nama" value="{{ old('nama', $mahasiswa->nama) }}" required>
        </p>

        <p>
            <label for="jenis_kelamin">Jenis Kelamin:</label><br>
            <input type="text" id="jenis_kelamin" name="jenis_kelamin" value="{{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) }}" required>
        </p>

        <p>
            <label for="alamat">Alamat:</label><br>
            <input type="text" id="alamat" name="alamat" value="{{ old('alamat', $mahasiswa->alamat) }}" required>
        </p>

        <p>
            <label for="no_hp">No. HP:</label><br>
            <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp', $mahasiswa->no_hp) }}" required>
        </p>

        <button type="submit">Simpan Perubahan</button>
        <a href="{{ url('/mahasiswa') }}">Batal</a>
    </form>
</body>
</html>
