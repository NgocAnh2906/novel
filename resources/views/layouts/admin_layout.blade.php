<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container-fluid">
                         
                    
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <ul class="navbar-nav mr-auto">
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Danh mục
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{route('danhmuc.create')}}">Thêm danh mục</a></li>
                            <li><a class="dropdown-item" href="{{route('danhmuc.index')}}">Liệt kê danh mục</a></li>
                        </ul>
                     </li>
                     <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Thể loại
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{route('theloai.create')}}">Thêm thể loại </a></li>
                            <li><a class="dropdown-item" href="{{route('theloai.index')}}">Liệt kê thể loại</a></li>
                        </ul>
                     </li>
                     <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Sách truyện
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{route('truyen-tieu-thuyet.create')}}">Thêm sách truyện</a></li>
                            <li><a class="dropdown-item" href="{{route('truyen-tieu-thuyet.index')}}">Liệt kê sách truyện</a></li>
                            </ul>
                     </li>
                     <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Chapter
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{route('chapter.create')}}">Thêm Chapter</a></li>
                            <li><a class="dropdown-item" href="{{route('chapter.index')}}">Liệt kê Chapter </a></li>
                            </ul>
                     </li>
                     </ul>
                   </ul>
                  

                      <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                      </form>
                           </div>            
                </div>
                      </nav>
</div>