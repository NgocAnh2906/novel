<div id="main" class="shell">
		<!-- Sidebar -->
		<div id="sidebar">
			<ul class="categories">
				<li>
					<h4>Thể loại</h4>
					<ul>
						@foreach ($theloai as $key => $tl)
						<li><a href="{{url('the-loai/'.$tl->slug_cate_novel)}}">{{$tl->name_cate_novel}}</a></li>
						@endforeach
					</ul>
				</li>
				<li>
					<h4>Truyện hot</h4>
					<ul>
						@for($i=0; $i < 5 ; $i++ )
						
						<li class="side-name" ><a href="{{url('doc-truyen/'.$truyen[$i]->id_novel)}} ">{{$truyen[$i]->name_novel}}</a></li>
						
						@endfor
					</ul>
				</li>

			</ul>
				
		</div>
		<!-- End Sidebar -->