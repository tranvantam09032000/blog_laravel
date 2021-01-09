@extends('Template_Admin.home')
@section('name-page','Tags')
@section('content')
@if(Session::has('success'))
        <div class="alert alert-success" role="alert">
             {{Session('success')}}
        </div>
@endif
<a href="{{route('tag.create')}}" class="btn btn-info btn-sm">Thêm mới</a>
<br></br>

<table class="table table-triped table-hover table-sm table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên tag</th>
            <th>Hoạt động</th>
        </tr>
    </thead>
@foreach ($tag as $result => $hasil)
    <tbody>
        <tr>
            <td>{{$result + $tag -> firstitem()}}</td>
            <td>{{$hasil->name}}</td>
            <td>
                <form action="{{route('tag.destroy', $hasil->id)}} " method="POST">
                    @csrf
                    @method('delete')
                    <a href="{{route('tag.edit', $hasil->id)}}" class="btn btn-primary btn-sm">Sửa</a>
                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                </form>
            </td>
           
        </tr>
@endforeach
    </tbody>
</table>
{{$tag->links()}}
@endsection 