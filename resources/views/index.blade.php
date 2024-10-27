<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">    
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css" />
    <link rel="stylesheet" href="{{ asset('/css/stylesheets.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><b>GoodBooks.co</b></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#">Coming soon</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#">Coming Soon</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Account
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item disabled" href="#">Coming soon</a></li>
                  <li><a class="dropdown-item disabled" href="#">Coming soon</a></li>
                  <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                </ul>
            </ul>
          </div>
        </div>
    </nav>    
    <div class="table-container" id="home">
        <h1 class="text-center mb-4">Daftar Buku</h1>
        <table id="bookTable" class="table table-striped table-bordered table-hover" width="100%">
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
                        <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Anda yakin ingin menghapus buku ini?')" class="btn badge btn-danger btn-sm">Hapus</button>
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
        <div class="d-flex justify-content-center mb-3 mt-3">
            <a href="{{ route('buku.create') }}" class="btn badge btn-primary">Tambah Buku</a>
        </div>
    </div>
    
    <script>
        new DataTable('#bookTable');
    </script>
</body>
</html>
