@extends('../layout')
@section ('menu')
	@include ('pages.menu')
@endsection
@section('content')	

<div class="products">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{ url('danh-muc/'.$truyen_breadcrumd->danhmuc->slug_category) }}">
                    {{$truyen_breadcrumd->danhmuc->name_category}}
            </a>
            </li>
        <li class="breadcrumb-item active" aria-current="page">{{$truyen_breadcrumd->name_novel}}</li>
    </ol>
    </nav>
        <!-- Novel chi tiết truyện --> 
<ul>
    <li>
        <div class="product detail">
            <div class="d-flex">
                <a href="#" class="info">
                    <span class="holder">
                    <img src="{{asset('uploads/truyen/'.$truyen2->image)}}" alt="" />
                </a>
                <div class="product-info">
                    <span class="book-name detail">{{$truyen2->name_novel}}</span>
                    <span class="author">Tác giả: {{$truyen2->author}}</span>
                    <span class="theloai">Thể loại truyện: <a href="{{url('the-loai/'.$truyen2->theloai->slug_cate_novel)}}">{{$truyen2->theloai->name_cate_novel}}</a> </span>
                    <span class="theloai">Số chương: @php echo $count= count($chapter)  @endphp </span>
                    <span class="theloai">Số lượt xem: {{$truyen2->view}} </span>
                    @if($chapter_dau)
                    <a href="{{url('xem-chuong/'.$chapter_dau->slug_chapter)}}" class="btn btn-primary">Đọc online</a>
                    @else
                    <a class="btn btn-danger">Hiện truyện đang cập nhật</a>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <p class="description-info">{!!$truyen2->description!!}</p>
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
                <li class="chapter-item"><a href="{{url('xem-chuong/'.$chap->slug_chapter)}}">{{$chap->name_chapter}}</a></li>
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
            @for($i=0; $i < 4 ; $i++ )	
                <li>
                    <div class="product">
                        <a href=" {{url('doc-truyen/'.$cungtheloai[$i]->id_novel)}} " class="info">
                            <span class="holder">
                                <img src="{{asset('uploads/truyen/'.$cungtheloai[$i]->image)}}" alt="" />
                                <span class="book-name">{{$cungtheloai[$i]->name_novel}}</span>
                                <span class="author">{{$cungtheloai[$i]->author}}</span>
                                <span class="description">{!!$cungtheloai[$i]->description!!}</span>
                            </span>
                        </a>
                    </div>
                </li>
            @endfor
        @endif
    </ul>
</div>
@endsection
    