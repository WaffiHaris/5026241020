<!DOCTYPE html>
<html lang="en">

<head>
    <title>5026241020 Waffi Haris Ashari</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="mt-4 p-5 bg-primary text-white rounded">
        <h3>5026241020 Waffi Haris Ashari</h3>
        <p>@yield('judul_halaman')</p>
    </div>

    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Pegawai</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('sepedamotor.index') }}">Sepedamotor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('siswa.index') }}">Siswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Latihan 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Latihan 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">EAS</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        @yield('konten')
    </div>

</body>
</html>
