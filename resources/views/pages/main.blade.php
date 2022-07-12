@extends('../layout')
@section ('sider')
	@include ('pages.sider')
@endsection
@section('content')
	
		<!-- Content -->
		<div id="content">
			<!-- Products -->
			<div class="products">
				<h3>TRUYỆN MỚI CẬP NHẬT</h3>

				<ul>
				
					 @foreach ($truyen as $key => $t)
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
				</ul>
			<!-- End Products -->
			</div>
			<div class="cl">&nbsp;</div>
			<!-- Best-sellers -->
			<div id="best-sellers">
				<h3>TRUYỆN HOT</h3>
				<ul>
					@foreach ($truyen as $key => $t)
					<li>
						<div class="product">
							<a href="#">
								<img src="{{asset('uploads/truyen/'.$t->image)}}" alt="" />
								<span class="book-name">{{$t->name_novel}} </span>
								<span class="author">{{$t->author}}</span>
								<span class="description">{{$t->description}}</span>
							</a>
						</div>
					</li>
					@endforeach
				</ul>
			</div>
			<!-- End Best-sellers -->
		</div>
		<!-- End Content -->
		<div class="cl">&nbsp;</div>
	</div>
	<!-- End Main -->
	@endsection