@extends('../layout')

@section('content')	
	<!-- End Slider -->
    <div>
	<div id="main" class="shell">
		<!-- Sidebar -->
		<div id="sidebar">
			<ul class="categories">
				<li>
					<h4>Thể loại</h4>
					<ul>
						@foreach ($theloai as $key => $tl)
						<li><a href="#">{{$tl->name_cate_novel}}</a></li>
						@endforeach
					</ul>
				</li>
				<li>
					<h4>Truyện hot</h4>
					<ul>
						@foreach ( $truyen as $key => $t)
						<li class="side-name" ><a href="#">{{$t -> name_novel}}</a></li>
						@endforeach
					</ul>
				</li>
			</ul>				
		</div>   
        <div class="products">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Library</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
            </nav>
        <!-- Novel -->
            <ul>
                <li>
                    <div class="product detail">
                        <div class="d-flex">
                            <a href="#" class="info">
                                <span class="holder">
                                <img src="{{asset('uploads/truyen/'.$truyen2->image)}}" alt="" />
                            </a>
                            <div class="product-info">
                                <span class="book-name">{{$truyen2->name_novel}}</span>
                                <span class="author">Tác giả: {{$truyen2->author}}</span>
                                <span class="theloai">Thể loại truyện: <a href="{{url('the-loai/'.$truyen2->theloai->slug_cate_novel)}}">{{$truyen2->theloai->name_cate_novel}}</a> </span>
                                <span class="theloai">Số chương:  </span>
                                <span class="theloai">Số lượt xem: {{$truyen2->view}} </span>
                                <a href="#" class="btn btn-primary">Đọc online</a>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <p class="description-info">{{$truyen2->description}}</p>
                        </div>

                        <hr>
                        <h4>Mục lục</h4>
                        <ul class="chapter-list">
                            @php
                                $count1 = count($chapter)
                            @endphp
                            @if ($count1==0)
                                <p> &nbsp  &nbsp Truyện đang cập nhật.......</p>
                            @else
                            @foreach($chapter as $key => $chap )
                            <li class="chapter-item"><a href="{{url('xem-chương/'.$chap->slug_chapter)}}">{{$chap->name_chapter}}</a></li>
                           @endforeach
                           @endif
                        </ul>
                    </div>
                </li>
            </ul>
   
<!-- End Content -->
		<div class="cl">&nbsp;</div>
	</div>
    <div class="products">
    <h3>TRUYỆN CÙNG THỂ LOẠI</h3>
        <ul>
               @php
                    $count = count($cungtheloai)
                @endphp
                @if ($count==1)
                    <p> &nbsp  &nbsp Truyện đang cập nhật.......</p>
                @else
                @foreach ($cungtheloai as $key => $t)
                <li>
                    <div class="product">
                        <a href="#" class="info">
                            <span class="holder">
                                <img src="{{asset('uploads/truyen/'.$t->image)}}" alt="" />
                                <span class="book-name">{{$t->name_novel}}</span>
                                <span class="author">{{$t->author}}</span>
                                <span class="description">{{$t->description}}</span>
                            </span>
                        </a>
                    </div>
                </li>
                @endforeach
                @endif
        </ul>
    </div>
	@endsection
    