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
						<li class="side-name" ><a href="#">{{$t->name_novel}}</a></li>
						@endforeach
					</ul>
				</li>

			</ul>
				
		</div>
		<!-- End Sidebar -->