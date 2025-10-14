@extends('layout')

@section('content')
<a href="{{ route('biodata.create') }}">Tambah Biodata</a>
<table border="1" cellpadding="5" cellspacing="0" style="margin-top:10px;">
    <tr>
        <th>Nama</th>
        <th>Tgl Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Agama</th>
        <th>Alamat</th>
        <th>Tinggi Badan</th>
        <th>Berat Badan</th>
        <th>Foto</th>
        <th>Aksi</th>
    </tr>
    @forelse($biodata as $data)
        <tr>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->tgl_lahir }}</td>
            <td>{{ $data->jk }}</td>
            <td>{{ $data->agama }}</td>
            <td>{{ $data->alamat }}</td>
            <td>{{ $data->tinggi_badan }} cm</td>
            <td>{{ $data->berat_badan }} kg</td>
            <td>
                @if($data->foto)
                    <img src="{{ asset('storage/'.$data->foto) }}" width="60" alt="Foto">
                @else
                    Tidak ada
                @endif
            </td>
            <td>
                <a href="{{ route('biodata.edit', $data->id) }}">Edit</a> | 
                <form action="{{ route('biodata.destroy', $data->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background:none; border:none; color:red; cursor:pointer;">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="9" style="text-align:center;">Data kosong</td></tr>
    @endforelse
</table>
@endsection
