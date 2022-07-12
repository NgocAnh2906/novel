
	<!-- Slider -->
	<div id="slider">
		<div class="shell">
			<ul>
				@foreach ($truyen as $key => $t)
				<li>
					<div class="image">
						<img src="{{asset('uploads/truyen/'.$t->image)}}" alt="" />
					</div>
					<div class="details">
						<h2>Bestsellers</h2>
						<h3>Special Offers</h3>
						<p class="title">{{$t->name_novel}}</p>
						<p class="description">{{$t->description}}</p>
						
					</div>
				</li>
				@endforeach
			</ul>
			<div class="nav">
				<a href="#">1</a>
				<a href="#">2</a>
				<a href="#">3</a>
				<a href="#">4</a>
			</div>
		</div>
	</div>
	<!-- End Slider -->
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
		<!-- End Sidebar -->
	