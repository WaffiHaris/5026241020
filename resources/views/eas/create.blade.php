@extends('template')
@section('judul_halaman', 'Kode Soal tagihan_air')
@section('konten')

    <br>
    <h2>Tambah Data Tagihan Air</h2>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="card">
        <div class="card-header">
            Form Tambah Data Tagihan Air
        </div>

        <div class="card-body">
            <form action="{{ route('eas.store') }}" method="POST" onsubmit="return validasiForm()">
                @csrf

                <div class="mb-3">
                    <label for="ID" class="form-label">ID</label>
                    <input type="text" name="ID" id="ID" class="form-control" value="{{ old('ID') }}">
                </div>

                <div class="mb-3">
                    <label for="NoMeteran" class="form-label">No Meteran</label>
                    <input type="text" name="NoMeteran" id="NoMeteran" class="form-control"
                        value="{{ old('NoMeteran') }}">
                </div>

                <div class="mb-3">
                    <label for="MeteranAwal" class="form-label">Meteran Awal</label>
                    <input type="text" name="MeteranAwal" id="MeteranAwal" class="form-control"
                        value="{{ old('MeteranAwal') }}">
                </div>

                <div class="mb-3">
                    <label for="MeteranAkhir" class="form-label">Meteran Akhir</label>
                    <input type="text" name="MeteranAkhir" id="MeteranAkhir" class="form-control"
                        value="{{ old('MeteranAkhir') }}">
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('eas.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>

    @endsection
