
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
</head>
<body>

    <h1>Daftar Buku</h1>

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

    {{-- Form tambah buku --}}
    <fieldset style="margin-bottom: 20px; width: 300px;">
        <legend><b>Tambah Buku Baru</b></legend>

        <form action="{{ url('/books/store') }}" method="POST">
            @csrf
            <p>
                <label>Judul:</label><br>
                <input type="text" name="title" value="{{ old('title') }}">
                 @error('title')
                 <br><span style="color: red; font-size: 12px;">{{ $message }}</span>
                 @enderror
            </p>
            
            <p>
                <label>Penulis:</label><br>
                <input type="text" name="author" value="{{ old('author') }}">
                @error('author')
                <br><span style="color: red; font-size: 12px;">{{ $message }}</span>
                @enderror
            </p>

            <p>
                <label>Penerbit:</label><br>
                <input type="text" name="publisher" value="{{ old('publisher') }}">
                @error('publisher')
                <br><span style="color: red; font-size: 12px;">{{ $message }}</span>
                @enderror
            </p>

            <p>
                <label>Stok:</label><br>
                <input type="number" name="stock" value="{{ old('stock') }}">
                @error('stock')
                <br><span style="color: red; font-size: 12px;">{{ $message }}</span>
                @enderror
            </p>

            <button type="submit">Simpan Buku</button>
        </form>
    </fieldset>

    <hr>

    {{-- Tabel daftar buku --}}
    <h2>Data Buku</h2>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($books as $index => $book)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->publisher ?? '-' }}</td>
                    <td>{{ $book->stock }}</td>
                    <td>
                        <a href="{{ url('/books/edit/' . $book->id) }}">Edit</a>
                        <form
                            action="{{ url('/books/destroy/' . $book->id) }}"
                            method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus buku ini?')"
                        >
                            @csrf
                            @method('DELETE')

                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada data buku.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
