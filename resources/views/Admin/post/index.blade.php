@extends('Template_Admin.home')
@section('name-page','Bài Viết')
@section('content')
@if(Session::has('success'))
        <div class="alert alert-success" role="alert">
             {{Session('success')}}
        </div>
@endif
<a href="{{route('post.create')}}" class="btn btn-info btn-sm">Tạo bài viết mới</a>
<br></br>

<table class="table table-triped table-hover table-sm table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tiêu đề</th>
            <th>Thể loại</th>
            <th>Tags</th>
            <th>Tác giả</th>
            <th>Hình ảnh</th>
            <th>Hoạt động</th>
        </tr>
    </thead>
@foreach ($post as $result => $hasil)
    <tbody>
        <tr>
            <td>{{$result + $post -> firstitem()}}</td>
            <td>{{$hasil->title}}</td>
            <td>{{$hasil->category->name}}</td>
            <td>
            @foreach($hasil->tags as $tag)
                <ul>
                <h6><span class="badge badge-info">{{$tag->name}} </span></h6>
                </ul>
                @endforeach
            </td>
            <td>{{$hasil->users->name}}</td>
            <td><img src="{{ asset($hasil->image) }}" class="img-fluid" style="width: 50px; height: 50px"></td>
            <td>
                <form action="{{route('post.destroy', $hasil->id)}} " method="POST">
                    @csrf
                    @method('delete')
                    <a href="{{route('post.edit', $hasil->id)}}" class="btn btn-primary btn-sm">Sửa</a>
                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                </form>
            </td>
           
        </tr>
@endforeach
    </tbody>
</table>
{{$post->links()}}
@endsection 