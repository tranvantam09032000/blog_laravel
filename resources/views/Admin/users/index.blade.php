@extends('Template_Admin.home')
@section('name-page','Tài khoản người dùng')
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
            <th>Họ tên</th>
            <th>Email</th>
            <th>Chức vụ</th>
            <th>Hoạt động</th>
        </tr>
    </thead>
@foreach ($user as $result => $hasil)
    <tbody>
        <tr>
            <td>{{$result + $user -> firstitem()}}</td>
            <td>{{$hasil->name}}</td>
            <td>{{$hasil->email}}</td>
            <td>
            @if($hasil->type)
                <span class="badge badge-info">Quản trị viên</span>
                 @else
                <span class="badge badge-warning">Tác giả</span>
            @endif
            </td>
            <td>
                <form action="{{route('users.destroy', $hasil->id)}} " method="POST">
                    @csrf
                    @method('delete')
                    <a href="{{route('user.lock', $hasil->id)}}" class="btn btn-warning btn-sm">Khóa</a>
                    <!-- <button type="submit" class="btn btn-danger btn-sm">Xóa</button> -->
                </form>
            </td>
           
        </tr>
@endforeach
    </tbody>
</table>
{{$user->links()}}
@endsection 