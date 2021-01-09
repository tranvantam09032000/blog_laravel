@extends('Template_Admin.home')
@section('name-page','Thể Loại')
@section('content')
@if(Session::has('success'))
        <div class="alert alert-success" role="alert">
             {{Session('success')}}
        </div>
@endif
<a href="{{route('category.create')}}" class="btn btn-info btn-sm">Thêm mới</a>
<br></br>

<table class="table table-triped table-hover table-sm table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Thể loại</th>
            <th>Hoạt động</th>
        </tr>
    </thead>
@foreach ($category as $result => $hasil)
    <tbody>
        <tr>
            <td>{{$result + $category -> firstitem()}}</td>
            <td>{{$hasil->name}}</td>
            <td>
                <form action="{{route('category.destroy', $hasil->id)}} " method="POST">
                    @csrf
                    @method('delete')
                    <a href="{{route('category.edit', $hasil->id)}}" class="btn btn-primary btn-sm">Sửa</a>
                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                </form>
            </td>
           
        </tr>
@endforeach
    </tbody>
</table>
{{$category->links()}}
@endsection 