@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
        <fieldset>
        <legend>DATA POST</legend>
        <div class="table-responsive py-2">
            <a href=" {{ route('post.create') }}" class="btn btn-sm btn-primary" style="align:float-right">
                Tambah Data
            </a>
        <table class="table" border ="1">
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Content</th>
                <th>Action</th>
            </tr>
            @foreach ($post as $data)
            <tr>
                <th>{{$loop->iteration}}</th>
                <th>{{$data->title}}</th>
                <th>{{Str::limit($data->content, 100)}}</th>
                <th>
                    <form action="{{ route('post.delete',$data->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('post.edit',$data->id) }}" class="btn btn-sm btn-danger">
                            Edit
                        </a> |
                        <a href="{{ route('post.show',$data->id) }}" class="btn btn-sm btn-warning">
                            Show
                        </a> |
                        <button type="submit" onlick="return confirm('apakah anda yakin?')"
                         class="btn btn-sm btn-success">Delete
                        </button>
                    </form>
                </th>
            </tr>
            @endforeach
        </table>
      </div>
    </fieldset>
        </div>
    </div>
</div>
@endsection


    