@extends('Template_Admin.home')
@section('name-page','Bài Viết Đã Xóa')
@section('content')
@if(Session::has('success'))
        <div class="alert alert-success" role="alert">
             {{Session('success')}}
        </div>
@endif


<table class="table table-triped table-hover table-sm table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tiêu đề</th>
            <th>Thể loại</th>
            <th>Tags</th>
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
            <td>@foreach($hasil->tags as $tag)
                <ul>{{$tag->name}}</ul>
                @endforeach
            </td>
            <td><img src="{{ asset($hasil->image) }}" class="img-fluid" style="width: 50px; height: 50px"></td>
            <td>
                <form action="{{route('post.kill', $hasil->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="{{ route ('post.restore',$hasil->id ) }}" class="btn btn-info btn-sm">Phục hồi</a>
                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                </form>
            </td>
           
        </tr>
@endforeach
    </tbody>
</table>
{{$post->links()}}
@endsection 