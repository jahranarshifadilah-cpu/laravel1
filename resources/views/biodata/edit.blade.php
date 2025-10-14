@extends('layout')

@section('content')
<a href="{{ route('biodata.index') }}">Kembali</a>
<h2>Edit Biodata</h2>

@if($errors->any())
    <div style="color:red;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('biodata.update', $biodatum->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Nama:</label><br>
    <input type="text" name="nama" value="{{ old('nama', $biodatum->nama) }}"><br><br>

    <label>Tanggal Lahir:</label><br>
    <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir', $biodatum->tgl_lahir) }}"><br><br>

    <label>Jenis Kelamin:</label><br>
    <input type="radio" name="jk" value="Laki-laki" {{ old('jk', $biodatum->jk) == 'Laki-laki' ? 'checked' : '' }}> Laki-laki
    <input type="radio" name="jk" value="Perempuan" {{ old('jk', $biodatum->jk) == 'Perempuan' ? 'checked' : '' }}> Perempuan<br><br>

    <label>Agama:</label><br>
    <select name="agama">
        <option value="">-- Pilih Agama --</option>
        @foreach(['Islam','Kristen','Katolik','Hindu','Budha','Konghucu'] as $agama)
            <option value="{{ $agama }}" {{ old('agama', $biodatum->agama) == $agama ? 'selected' : '' }}>{{ $agama }}</option>
        @endforeach
    </select><br><br>

    <label>Alamat:</label><br>
    <textarea name="alamat">{{ old('alamat', $biodatum->alamat) }}</textarea><br><br>

    <label>Tinggi Badan (cm):</label><br>
    <input type="number" name="tinggi_badan" value="{{ old('tinggi_badan', $biodatum->tinggi_badan) }}"><br><br>

    <label>Berat Badan (kg):</label><br>
    <input type="number" name="berat_badan" value="{{ old('berat_badan', $biodatum->berat_badan) }}"><br><br>

    <label>Foto:</label><br>
    @if($biodatum->foto)
        <img src="{{ asset('storage/'.$biodatum->foto) }}" width="100"><br>
    @endif
    <input type="file" name="foto"><br><br>

    <button type="submit">Update</button>
</form>
@endsection
