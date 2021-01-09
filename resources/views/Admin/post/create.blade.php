@extends('Template_Admin.home')
@section('name-page','Tạo bài viết')
@section('content')

@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            <h6>Chưa nhập đầy đủ thông tin ! </h6> 
        </div>
    @endforeach
@endif

@if(Session::has('success'))
        <div class="alert alert-success" role="alert">
             {{Session('success')}}
        </div>
@endif

<form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label >Tiêu đề</label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
        <label >Thể loại</label>
        <select  class="form-control" name="category_id">
        <option value="" holder>Thể loại---</option>
        @foreach($category as $result)
        <option value="{{$result->id}}">{{$result->name}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Tags</label>
            <select class="form-control select2" multiple="" style="background-color: #3abaf4" name="tags[]">
               @foreach($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->name}}</option>
              @endforeach
            </select>
     </div>
    <div class="form-group">
        <label >Hình ảnh</label>
        <input type="file" class="form-control" name="image">
    </div>
    <div class="form-group">
        <label >Nội dung</label>
       <textarea class="form-control" name="content" id="content" ></textarea>
    </div>

    <div class="form-group">
        <button class="btn btn-primary btn-block">Tạo bài viết</button>
    </div>
</form>
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace( 'content' );
</script>
@endsection 