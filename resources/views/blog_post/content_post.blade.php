@extends('Template_blog.content')
@section('content_post')
@foreach($data as $content_post=>$hasil)
<div id="post-header" class="page-header">
			<div class="page-header-bg" style="background-image: url({!!asset($hasil->image)!!});" data-stellar-background-ratio="0.5"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<div class="post-category">
							<a href="category.html">{!!$hasil->category->name!!}</a>
						</div>
						<h1>{!!$hasil->title!!}</h1>
						<ul class="post-meta">
							<li><a href="author.html">{!!$hasil->users->name!!}</a></li>
							<li>{!!$hasil->created_at!!}</li>
							
						</ul>
						
					</div>
				</div>
			</div>
		</div>
		<!-- /PAGE HEADER -->
	</header> 
<div class="col-md-8 hot-post-left">
    <br>

    <div class="section-row">
    {!!$hasil->content!!}
    </div>



					<h3 class="footer-title">Tags:</h3>
						<div class="tags-widget">
							<ul>
							@foreach($hasil->tags as $hh)
								<li><a>{{$hh->name}}</a></li>
							
								
								@endforeach
							</ul>
	</div>
						@endforeach
</div>
@endsection