<div id="header" class="shell">
        <div class="logo-container">
            <a href="#">
                    <img class="logo" src="/css/images/login.png" alt="">
                    <span></span>
            </a>
        </div>
        <!-- Navigation -->
        <div id="navigation">
            <ul  class="navigation-list">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/') }}">Trang chủ <span class="sr-only"></span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active"  id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Danh mục
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                         @foreach ($danhmuc as $key => $dm)
                        <li><a class="dropdown-item" href="{{url('danh-muc/'.$dm->slug_category)}}">{{$dm->name_category}}</a></li>
                         @endforeach
                    </ul> 
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active"  id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Thể loại
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                         @foreach ($theloai as $key => $tl)
                        <li><a class="dropdown-item" href="{{url('the-loai/'.$tl->slug_cate_novel)}}">{{$tl->name_cate_novel}}</a></li>
                         @endforeach
                    </ul> 
                </li>
                <form class="d-flex" action="{{url('tim-kiem')}}" method="GET">
                    <input class="form-control me-2" type="search"  name="tukhoa"  placeholder="Tìm kiếm truyện, tác giả..." aria-label="Search">
                
                    <button class="btn btn-outline-success" type="submit">Tìm kiếm</button>
                </form>
            </ul>
            
        </div>
        <!-- End Navigation -->
        <div class="cl">&nbsp;</div>
        <!-- Login-details -->
        <div id="login-details">
            <i class="fa-thin fa-alarm-clock"></i>
            <p>Xin chào, <a href="{{ route('login') }}" id="user">Đăng nhập</a> .</p><p><a href="#" class="cart" ><img src="../css/images/cart-icon.png" alt="" /></a>Shopping Cart (0) <a href="#" class="sum">$0.00</a></p>
        </div>
        <!-- End Login-details -->
    </div>