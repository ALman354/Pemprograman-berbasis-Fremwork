
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
</head>
<body>

    <h1>Daftar Mahasiswa</h1>

    {{-- Notifikasi berhasil --}}
    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    {{-- Pesan validasi --}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form tambah mahasiswa --}}
    <fieldset style="margin-bottom: 20px; width: 300px;">
        <legend><b>Tambah Mahasiswa Baru</b></legend>

        <form action="{{ url('/mahasiswa/store') }}" method="POST">
            @csrf
            <p>
                <label>Nama:</label><br>
                <input type="text" name="nama" value="{{ old('nama') }}">
                 @error('nama')
                 <br><span style="color: red; font-size: 12px;">{{ $message }}</span>
                 @enderror
            </p>
            
            <p>
                <label>Jenis Kelamin:</label><br>
                <input type="text" name="jenis_kelamin" value="{{ old('jenis_kelamin') }}">
                @error('jenis_kelamin')
                <br><span style="color: red; font-size: 12px;">{{ $message }}</span>
                @enderror
            </p>

            <p>
                <label>Alamat:</label><br>
                <input type="text" name="alamat" value="{{ old('alamat') }}">
                @error('alamat')
                <br><span style="color: red; font-size: 12px;">{{ $message }}</span>
                @enderror
            </p>

            <p>
                <label>No. HP:</label><br>
                <input type="text" name="no_hp" value="{{ old('no_hp') }}">
                @error('no_hp')
                <br><span style="color: red; font-size: 12px;">{{ $message }}</span>
                @enderror
            </p>

            <button type="submit">Simpan Mahasiswa</button>
        </form>
    </fieldset>

    <hr>

    {{-- Tabel daftar mahasiswa --}}
    <h2>Data Mahasiswa</h2>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>id</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>No. HP</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($mahasiswa as $index => $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->nama }}</td>
                    <td>{{ $student->jenis_kelamin }}</td>
                    <td>{{ $student->alamat }}</td>
                    <td>{{ $student->no_hp }}</td>
                    <td>
                        <a href="{{ url('/mahasiswa/edit/' . $student->id) }}">Edit</a>
                        <form
                            action="{{ url('/mahasiswa/destroy/' . $student->id) }}"
                            method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus mahasiswa ini?')"
                        >
                            @csrf
                            @method('DELETE')

                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada data mahasiswa.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
