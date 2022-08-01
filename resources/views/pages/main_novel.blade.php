@extends('../layout')
@section ('menu')
	@include ('pages.menu')
@endsection
@section('content')
<!-- End Slider -->
<!-- Đọc truyện theo chương -->

<div class="products">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">
            <a href="{{ url('doc-truyen/'.$truyen_breadcrumd->slug_novel) }}">
                {{$truyen_breadcrumd->name_novel}}
            </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">{{$chapter_truyen->name_chapter}}</li>

    </ol>
    </nav>
<!-- Novel -->  

<ul>
    <li>
        <div class="product detail">
            <div class="d-flex">        
                <div class="product-info">
                    <span class="book-name">{{$truyen_chapter->truyen->name_novel}}</span>
                    <span class="author"></span>  
                    <select id="select-chapter" class="custom-select select-chapter" name="select-chapter">
                        @foreach ($chapter as $key =>$chap)
                            <option value="{{url('xem-chuong/'.$chap->slug_chapter)}}">{{$chap->name_chapter}}
                            </option>
                        @endforeach
                    </select>                                                       
                </div>
            </div>    
            <div class="col-md-12">
                <p class="description-info">
                    {!!$truyen_chapter->main_content!!}
                    </p>
            </div>

            <hr>
            <style type="text/css">
              .isDisabled{x
                color:currentColor;
                pointer-events: none;
                opacity: 0.5;
                text-decoration: none;
              }
            </style>    
            <h4>Mục lục</h4>
            <nav class="pagination-container">
					<ul class="pagination justify-content-center">
						<li class="page-item">
						<a class="page-link  " href="{{url('xem-chuong/'.$chapter_sau)}}" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
							<span class="sr-only">Chương trước</span>
						</a>
						</li>
                            <select id="select-chapter" class="custom-select select-chapter" name="select-chapter">
                                @foreach ($chapter as $key =>$chap)
                                    <option value="{{url('xem-chuong/'.$chap->slug_chapter)}}">{{$chap->name_chapter}}
                                    </option>
                                @endforeach
                            </select>   
						<li class="page-item">
						<a class="page-link " href="{{url('xem-chuong/'.$chapter_truoc)}}" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
							<span class="sr-only">Chương sau</span>
						</a>
						</li>
					</ul>
					</nav>
            
        </div>
    </li>
</ul>

<!-- End Content -->
<div class="cl">&nbsp;</div>
</div>

@endsection
