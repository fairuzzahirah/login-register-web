<link rel="stylesheet" href="{{ asset('/css/stylesheet.css') }}">

<div class="container">
    <h4>Tambah buku</h4>
    <form method="post" action="{{route('buku.store')}}">
        @csrf
        <div>Judul <input type="text" name="judul"></div>
        <div><form action="{{ route('buku.store')}}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="mb-3 row">
                <label for="photo" class="col-md-4 col-form-label text-md-end text-start">Foto Buku</label>
                <div class="col-md-6">
                    <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" value="{{ old('photo')}}">
                    @if ($errors->has('photo'))
                    <span class="text-danger">{{ $errors->first('photo') }}</span>
                    @endif
                </div>
            </div>
        <div>Penulis <input type="text" name="penulis"></div>
        <div>Harga <input type="text" name="harga"></div>
        <div>Tanggal Terbit <input type="date" name="tgl_terbit"></div>
        <button type="submit">Simpan</button>
        <a href="{{'/buku'}}">Kembali</a>
    </form>
</div>
