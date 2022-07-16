
	<!-- Slider -->
	<div id="slider">
		<div class="shell">
			<ul>
				@foreach ($truyen as $key => $t)
				<li>
					<a href="{{url('doc-truyen/'.$t->id_novel)}}">
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
	
	