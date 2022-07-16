<div id="header" class="shell">
        <div id="logo"><h1><a href="#">BestSeller</a></h1><span><a href="#">free css template</a></span></div>
        <!-- Navigation -->
        <div id="navigation">
            <ul>
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
                <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                      </form>
            </ul>
            
        </div>
        <!-- End Navigation -->
        <div class="cl">&nbsp;</div>
        <!-- Login-details -->
        <div id="login-details">
            <p>Welcome, <a href="#" id="user">Guest</a> .</p><p><a href="#" class="cart" ><img src="../css/images/cart-icon.png" alt="" /></a>Shopping Cart (0) <a href="#" class="sum">$0.00</a></p>
        </div>
        <!-- End Login-details -->
    </div>