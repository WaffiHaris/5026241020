@extends('template')
@section('title', 'Data Sepeda Motor')
@section('konten')

    <h2>Data Sepeda Motor</h2>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('sepedamotor.create') }}" class="btn btn-primary">Tambah Sepeda Motor</a>

    <br><br>

    <table class="table table-striped table-hover">
        <tr>
            <th>Kode</th>
            <th>Merk</th>
            <th>Stock</th>
            <th>Tersedia</th>
            <th>Aksi</th>
        </tr>

        @forelse($sepedamotor as $row)
            <tr>
                <td>{{ $row->kodesepedamotor }}</td>
                <td>{{ $row->merksepedamotor }}</td>
                <td>{{ $row->stocksepedamotor }}</td>
                <td>{{ $row->tersedia }}</td>
                <td>
                    <a href="{{ route('sepedamotor.edit', $row->kodesepedamotor) }}" class="btn btn-warning">Edit</a>

                    <form action="{{ route('sepedamotor.destroy', $row->kodesepedamotor) }}" method="POST" style="display:inline;"
                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Belum ada data sepeda motor.</td>
            </tr>
        @endforelse
    </table>
@endsection
