@extends('Template_blog.content')
@section('content_post')
			<div class="col-md-8 hot-post-left">
					<!-- post -->
					<div class="post post-thumb">
						<a class="post-img" href="content-post/lap-trinh-laravel"><img src="{{ asset('public/uploads/posts/1608602082laravel.png')}}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a >HỌC LẬP TRÌNH</a>
							</div>
							<h3 class="post-title title-lg"><a href="content-post/lap-trinh-laravel">Lập trình Laravel</a></h3>
							<ul class="post-meta">
								<li><a>DEVELOPER</a></li>
								<li>2020-12-21 13:51:44</li>
							</ul>
						</div>
					</div>
					<!-- /post -->
				</div>
				<div class="col-md-4 hot-post-right">
					<!-- post -->
					<div class="post post-thumb">
						<a class="post-img" href="blog-post.html"><img src="{{ asset('../user/img/hot-post-2.jpg')}}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="category.html">Lifestyle</a>
							</div>
							<h3 class="post-title"><a href="blog-post.html">Sed ut perspiciatis, unde omnis iste natus error sit</a></h3>
							<ul class="post-meta">
								<li><a href="author.html">John Doe</a></li>
								<li>20 April 2018</li>
							</ul>
						</div>
					</div>
					</div>
					<!-- /post -->

					<!-- post -->
					
					<!-- /post -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<!-- row -->
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">
								<h2 class="title">Bài viết mới nhất</h2>
							</div>
						</div>
						<!-- post -->
						@foreach($data as $post_new)
						@if($post_new->status)
						<div class="col-md-6">
							<div class="post">
								<a class="post-img" href="{{route('blog_post.content_post',$post_new->slug)}}"><img src="{{ $post_new->image}}" alt="" style="height: 200px"></a>
								<div class="post-body">
									<div class="post-category">
										<a >{{ $post_new->category->name}}</a>
									</div>
									<h3 class="post-title"><a href="{{route('blog_post.content_post',$post_new->slug)}}">{{ $post_new->title}}</a></h3>
									<ul class="post-meta">
										<li><a >{{ $post_new->users->name}}</a></li>
										<li>{{ $post_new->created_at}}</li>
									</ul>
								</div>
							</div>
						</div>
						@endif
						@endforeach
					</div>
				</div>
						<!-- /post -->
			
@endsection


	

	