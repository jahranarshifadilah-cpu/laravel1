@extends('layout')

@section('content')
<a href="{{ route('biodata.index') }}">Kembali</a>
<h2>Tambah Biodata</h2>

@if($errors->any())
    <div style="color:red;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('biodata.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Nama:</label><br>
    <input type="text" name="nama" value="{{ old('nama') }}"><br><br>

    <label>Tanggal Lahir:</label><br>
    <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir') }}"><br><br>

    <label>Jenis Kelamin:</label><br>
    <input type="radio" name="jk" value="Laki-laki" {{ old('jk') == 'Laki-laki' ? 'checked' : '' }}> Laki-laki
    <input type="radio" name="jk" value="Perempuan" {{ old('jk') == 'Perempuan' ? 'checked' : '' }}> Perempuan<br><br>

    <label>Agama:</label><br>
    <select name="agama">
        <option value="">-- Pilih Agama --</option>
        @foreach(['Islam','Kristen','Katolik','Hindu','Budha','Konghucu'] as $agama)
            <option value="{{ $agama }}" {{ old('agama') == $agama ? 'selected' : '' }}>{{ $agama }}</option>
        @endforeach
    </select><br><br>

    <label>Alamat:</label><br>
    <textarea name="alamat">{{ old('alamat') }}</textarea><br><br>

    <label>Tinggi Badan (cm):</label><br>
    <input type="number" name="tinggi_badan" value="{{ old('tinggi_badan') }}"><br><br>

    <label>Berat Badan (kg):</label><br>
    <input type="number" name="berat_badan" value="{{ old('berat_badan') }}"><br><br>

    <label>Foto:</label><br>
    <input type="file" name="foto"><br><br>

    <button type="submit">Simpan</button>
</form>
@endsection
