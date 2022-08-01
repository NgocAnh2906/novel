@extends('../layout')
@section ('menu')
	@include ('pages.menu')
@endsection
@section('content')
	
	
        
        <div class="products">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
                 <li class="breadcrumb-item active" aria-current="page">Tìm kiếm</li>
            </ol>
            </nav>
        <!-- Novel -->
         <div class="products">
        <h3> Bạn tìm kiếm với từ khóa là: {{$tukhoa}}</h3>
            <ul>
                @php
                    $count = count($truyen_timkiem)
                @endphp
                @if ($count==0)
                    <p> &nbsp  &nbsp Không tìm thấy truyện.......</p>
                @else
                @foreach ($truyen_timkiem as $key => $t)
                <li>
                    <div class="product">
                        <a href="{{url('doc-truyen/'.$t->id_novel)}} " class="info">
                            <span class="holder">
                                <img src="{{asset('uploads/truyen/'.$t->image)}}" alt="" />
                                <span class="book-name">{{$t->name_novel}}</span>
                                <span class="author">{{$t->author}}</span>
                                <span class="description">{!!$t->description!!}</span>
                            </span>
                        </a>
                    </div>
                </li>
                @endforeach
                @endif
            </ul>
    </div>
  
  
   
<!-- End Content -->
		<div class="cl">&nbsp;</div>
	</div>
  
 
	@endsection
    