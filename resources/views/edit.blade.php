<link rel="stylesheet" href="{{ asset('/css/stylesheet.css') }}">

<div class="container">
    <h1>Edit Buku</h1>
    <form action="{{ route('buku.update', $buku->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="judul">Judul Buku:</label>
        <input type="text" name="judul" value="{{ $buku->judul }}" required><br>

        <label for="penulis">Penulis:</label>
        <input type="text" name="penulis" value="{{ $buku->penulis }}" required><br>

        <label for="harga">Harga:</label>
        <input type="number" name="harga" value="{{ $buku->harga }}" required><br>

        <label for="tgl_terbit">Tanggal Terbit:</label>
        <input type="date" name="tgl_terbit" value="{{ $buku->tgl_terbit }}" required><br>

        <label for="status">Status:</label>
        <select name="status" required>
            <option value="Tersedia" {{ $buku->status == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
            <option value="Habis" {{ $buku->status == 'Habis' ? 'selected' : '' }}>Habis</option>
        </select><br>

        <button type="submit" class="btn btn-primary">Update Buku</button>
    </form>
</div>
