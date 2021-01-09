@include('Template_blog.head')
<!-- SECTION -->
<div class="section">
		<!-- container -->
	<div class="container">
		
        <div id="hot-post" class="row hot-post">
        @yield('content_post')
        @include('Template_blog.widget')
      
    </div>
   
    
</div>

						
				
				

@include('Template_blog.footer')