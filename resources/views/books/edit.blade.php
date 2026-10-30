<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
</head>
<body>
    <h1>Edit Buku</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/books/' . $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label for="title">Judul:</label><br>
            <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}" required>
        </p>

        <p>
            <label for="author">Penulis:</label><br>
            <input type="text" id="author" name="author" value="{{ old('author', $book->author) }}" required>
        </p>

        <p>
            <label for="publisher">Penerbit:</label><br>
            <input type="text" id="publisher" name="publisher" value="{{ old('publisher', $book->publisher) }}" required>
        </p>

        <p>
            <label for="stock">Stok:</label><br>
            <input type="number" id="stock" name="stock" value="{{ old('stock', $book->stock) }}" required>
        </p>

        <button type="submit">Simpan Perubahan</button>
        <a href="{{ url('/books') }}">Batal</a>
    </form>
</body>
</html>