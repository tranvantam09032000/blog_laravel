<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Blog Dev</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header"></li>
              <li class="active"><a class="nav-link" href="{{route('home')}}"><i class="fas fa-fire"></i> <span>Trang chủ</span></a></li>
              <li class="menu-header"></li>
              <li class="nav-item dropdown">
              <li>
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book-open"></i> <span>Bài Viết</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{route('post.index')}}">Danh sách bài viết</a></li>
                  <li><a class="nav-link" href="{{route('post.show_delete')}}">Danh sách bài viết đã xóa</a></li>
  
                </ul>
                </li>
                <li>
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-clipboard"></i> <span>Thể loại và tag</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{route('category.index')}}">Thể loại</a></li>
                  <li><a class="nav-link" href="{{route('tag.index')}}">Tag</a></li>
                </ul>
              </li>
              <li>
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i> <span>Tài khoản</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{route('users.index')}}">Danh sách tài khoản</a></li>
                  <li><a class="nav-link" href="{{route('users.viewuserlock')}}">Danh sách tài khoản khóa</a></li>
                </ul>
              </li>
           
        </aside>
      </div>