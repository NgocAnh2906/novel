
	<!-- Slider -->
	<div id="slider">
		<div class="shell">
			<ul>
		
				@for($i=0; $i < 4 ; $i++ )	
					<li>
						<a href="{{url('doc-truyen/'.$truyen[$i]->id_novel)}}">
						<div class="image">
							<img src="{{asset('uploads/truyen/'.$truyen[$i]->image)}}" alt="" />
						</div>
						<div class="details">
							<h2>Bestsellers</h2>
							<h3>Special Offers</h3>
							<p class="title">{{$truyen[$i]->name_novel}}</p>
							<p class="description">{!!$truyen[$i]->description!!}</p>
						</div>
						</a>
					</li>
				@endfor
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
	
	