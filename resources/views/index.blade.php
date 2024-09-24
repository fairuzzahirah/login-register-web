<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/stylesheets.css') }}">
    <title>Daftar Buku</title>
</head>
<body>
    <div class="table-container">
        <h1 class="text-center mb-4">Daftar Buku</h1>

        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Harga</th>
                    <th>Tanggal Terbit</th>
                    <th>Status</th>
                    <th>Aksi</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_buku as $index => $buku)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->penulis }}</td>
                    <td>{{ "Rp. ".number_format($buku->harga, 2, ',', '.') }}</td>
                    <td>{{\Carbon\Carbon::parse($buku->tgl_terbit)->format('d-m-Y') }}</td>
                    <td>
                        @if($buku->status == 'Tersedia')
                            <span class="badge badge-available">Tersedia</span>
                        @elseif($buku->status == 'Habis')
                            <span class="badge badge-out-of-stock">Habis</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('buku.destroy', $buku->id) }}" 
                            method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm
                            ('Anda yakin ingin menghapus buku ini?')" class="btn badge btn-danger 
                            btn-sm">Hapus</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('buku.edit', $buku->id) }}" method="POST">
                            @csrf
                            @method('GET')                
                            <button type="submit" class="btn badge btn-primary">Edit</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="tambah-buku">
            <a href="{{route('buku.create')}}" 
            class="btn badge btn-primary">Tambah Buku</a>
        </div>
        <div class="jumlah-buku mt-2">
            <p><strong>Jumlah Buku:</strong> {{ $jumlah_buku }}</p>
        </div>
        <div class="total-harga">
            <p><strong>Total Harga:</strong> {{ "Rp. ".number_format($total_harga, 2, ',', '.') }}</p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
