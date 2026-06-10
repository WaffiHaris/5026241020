@extends('template')
@section('title', 'Edit Sepeda Motor')
@section('konten')

    <h2>Edit Sepeda Motor</h2>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('sepedamotor.update', $sepedamotor->kodesepedamotor) }}" method="POST" onsubmit="return validasiForm()">
        @csrf
        @method('PUT')

        <p>
            <label>Merk Sepeda Motor</label><br>
            <input type="text" name="merksepedamotor" id="merksepedamotor" maxlength="30" value="{{ old('merksepedamotor', $sepedamotor->merksepedamotor) }}">
        </p>

        <p>
            <label>Stock</label><br>
            <input type="number" name="stocksepedamotor" id="stocksepedamotor" min="0" value="{{ old('stocksepedamotor', $sepedamotor->stocksepedamotor) }}">
        </p>

        <p>
            <label>Tersedia (Y/T)</label><br>
            <select name="tersedia" id="tersedia">
                <option value="Y" {{ old('tersedia', $sepedamotor->tersedia) == 'Y' ? 'selected' : '' }}>Y - Ya</option>
                <option value="T" {{ old('tersedia', $sepedamotor->tersedia) == 'T' ? 'selected' : '' }}>T - Tidak</option>
            </select>
        </p>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('sepedamotor.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

    <script>
        function validasiForm() {
            let merk = document.getElementById('merksepedamotor').value.trim();
            let stock = document.getElementById('stocksepedamotor').value.trim();
            let tersedia = document.getElementById('tersedia').value;

            if (merk === '') {
                Swal.fire({ title: "Kesalahan Input Data!", text: "Merk wajib diisi", icon: "error" });
                return false;
            }

            if (merk.length > 30) {
                Swal.fire({ title: "Kesalahan Input Data!", text: "Merk maksimal 30 karakter", icon: "error" });
                return false;
            }

            if (stock === '') {
                Swal.fire({ title: "Kesalahan Input Data!", text: "Stock wajib diisi", icon: "error" });
                return false;
            }

            if (tersedia === '') {
                Swal.fire({ title: "Kesalahan Input Data!", text: "Status ketersediaan wajib dipilih", icon: "error" });
                return false;
            }

            return true;
        }
    </script>
@endsection
