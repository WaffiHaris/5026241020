@extends('template')
@section('judul_halaman', 'Kode Soal tagihan_air')
@section('konten')
    <br>
    <h2>Data Tagihan Air</h2>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('eas.create') }}" class="btn btn-primary">Tambah Tagihan Air</a>

    <br><br>

    <table class="table table-striped table-hover">
        <tr>
            <th>ID</th>
            <th>No Meteran</th>
            <th>Penggunaan (m3)</th>
            <th>Total Tagihan</th>
        </tr>

        @forelse($tagihan as $row)
            <tr>
                <td>{{ $row->ID }}</td>
                <td>{{ $row->NoMeteran }}</td>
                <td> {{ number_format($row->MeteranAkhir - $row->MeteranAwal, 0, ',', '.') }}</td>
                <td>Rp {{ number_format(($row->MeteranAkhir - $row->MeteranAwal) * 5000, 0, ',', '.') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Belum ada data tagihan air.</td>
            </tr>
        @endforelse
    </table>

@endsection



