@extends('template')
@section('title', 'Data Keranjang Belanja')
@section('konten')

    <h2> <br> Keranjang Belanja</h2>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif


<a href="{{ route('latihan1.create') }}" class="btn btn-primary">Beli</a>
<br>
</br>

    <table class="table table-striped table-hover">
        <tr>
            <th>Kode Pembelian</th>
            <th>Kode Barang</th>
            <th>Jumlah Pembelian</th>
            <th>Harga per item</th>
            <th>Total</th>
            <th>Action</th>
        </tr>

        @forelse($keranjang as $row)
            <tr>
                <td>{{ $row->ID }}</td>
                <td>{{ $row->KodeBarang }}</td>
                <td>{{ $row->Jumlah }}</td>

                <td>Rp {{ number_format($row->Harga, 0, ',', '.') }}</td>

                <td>Rp {{ number_format($row->Jumlah * $row->Harga, 0, ',', '.') }}</td>

                <td>

                    <form action="{{ route('latihan1.destroy', $row->ID) }}" method="POST" style="display:inline;"
                        onsubmit="return confirm('Yakin ingin membatalkan pembelian ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Batal</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" style="text-align: center;">Belum ada data di keranjang belanja.</td>
            </tr>
        @endforelse
    </table>
@endsection
