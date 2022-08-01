@extends('../layout')
@section ('menu')
	@include ('pages.menu')
@endsection
@section('content')
	
	
        
        <div class="products">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
                 <li class="breadcrumb-item active" aria-current="page">{{$tendanhmuc}}</li>
            </ol>
            </nav>
        <!-- Novel -->
         <div class="products">
        <h3>{{$tendanhmuc}}</h3>
            <ul>
                @php
                    $count = count($truyen_dmuc)
                @endphp
                @if ($count==0)
                    <p> &nbsp  &nbsp Truyện đang cập nhật.......</p>
                @else
                @foreach ($truyen_dmuc as $key => $t)
                <li>
                    <div class="product">
                        <a href="{{url('doc-truyen/'.$t->id_novel)}} " class="info">
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
            <nav class="pagination-container">
                {!!$truyen_dmuc->links()!!}
            </nav>
    </div>
  
  
   
<!-- End Content -->
		<div class="cl">&nbsp;</div>
	</div>
  
 
	@endsection
    