@extends('../layout')
@section ('sider')
	@include ('pages.sider')
@endsection
@section ('menu')
	@include ('pages.menu')
@endsection
@section('content')
	
		<!-- Content -->
		<div id="content">
			<!-- Products -->
			<div class="products">
				<h3>TRUYỆN MỚI CẬP NHẬT</h3>
				<ul>
					
					@foreach ($truyen_pt as $key => $t)
					<li>
						<div class="product">
							<a href=" {{url('doc-truyen/'.$t->id_novel)}} " class="info">
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
				</ul>
				<nav class="pagination-container">
					{!!$truyen_pt->links()!!}
				</nav>
			<!-- End Products -->
			</div>
			
			
			<div class="cl">&nbsp;</div>
			<!-- Best-sellers -->
			<div id="best-sellers">
				<h3>TRUYỆN HOT</h3>
				<ul>
					@for($i=0; $i < 8 ; $i++ )	
					<li>
						<div class="product">
							<a href="{{url('doc-truyen/'.$truyen[$i]->id_novel)}}">
								<img src="{{asset('uploads/truyen/'.$truyen[$i]->image)}}" alt="" />
								<span class="book-name">{{$truyen[$i]->name_novel}} </span>
								<span class="author">{{$truyen[$i]->author}}</span>
								<span class="description">{!!$truyen[$i]->description!!}</span>
							</a>
						</div>
					</li>
					@endfor
				</ul>
			</div>
			<!-- End Best-sellers -->
		</div>
		<!-- End Content -->
		<div class="cl">&nbsp;</div>
	</div>
	<!-- End Main -->
	@endsection