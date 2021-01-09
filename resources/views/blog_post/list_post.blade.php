	<!-- post -->
    
    @extends('Template_blog.content')
    @section('content_post')
    <div class="col-md-8 hot-post-left">
        @foreach($data as $list_post)
        <div class="post post-row">
                            <a class="post-img" href="{{route('blog_post.content_post',$list_post->slug)}}"><img src="{!!asset($list_post->image)!!}" alt="{!!asset($list_post->title)!!}"></a>
                            <div class="post-body">
                                <div class="post-category">
                                    <a>{!!$list_post->category->name!!}</a>
                                    
                                   
                                </div>
                                <h3 class="post-title"><a href="{{route('blog_post.content_post',$list_post->slug)}}">{!!$list_post->title!!}</a></h3>
                                <ul class="post-meta">
                                    <li><a>{!!$list_post->users->name!!}</a></li>
                                    <li>{!!$list_post->created_at!!}</li>
                                </ul>
                               
                            </div>
                        </div>
        @endforeach
        <center>{{$data->links()}}</center>
        
    </div>
@endsection
                    