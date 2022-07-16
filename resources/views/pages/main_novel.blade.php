@extends('../layout')
@section ('menu')
	@include ('pages.menu')
@endsection
@section('content')
<!-- End Slider -->

<div class="products">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Library</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data</li>
    </ol>
    </nav>
<!-- Novel -->  
<ul>
    <li>
        <div class="product detail">
            <div class="d-flex">        
                <div class="product-info">
                    <span class="book-name">{{$truyen2->name_novel}}</span>
                    <span class="author">Chương hiện tại: {{$chapter-> }}</span>  
                    <select class="custom-select">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>                                                       
                </div>
            </div>    
            <div class="col-md-12">
                <p class="description-info">
                    Một cuộc giao dịch, cô mang thai con của người lạ,
                    mang bụng bầu gả cho người đàn ông đã đính ước từ nhỏ. Vốn cho rằng chỉ 
                    là một cuộc giao dịch, lại dây dưa thứ tình cảm không nên có trong cuộc
                    hôn nhân này. Mười tháng hoài thai sắp sinh, một tờ đơn ly hôn trên đất,
                    cô mới hoàn toàn tình ngộ. Sau này anh ta nói "Bà xã về đi, người
                    Một cuộc giao dịch, cô mang thai con của người lạ,
                    mang bụng bầu gả cho người đàn ông đã đính ước từ nhỏ. Vốn cho rằng chỉ 
                    là một cuộc giao dịch, lại dây dưa thứ tình cảm không nên có trong cuộc
                    hôn nhân này. Mười tháng hoài thai sắp sinh, một tờ đơn ly hôn trên đất,
                    cô mới hoàn toàn tình ngộ. Sau này anh ta nói "Bà xã về đi, người
                    Một cuộc giao dịch, cô mang thai con của người lạ,
                    mang bụng bầu gả cho người đàn ông đã đính ước từ nhỏ. Vốn cho rằng chỉ 
                    là một cuộc giao dịch, lại dây dưa thứ tình cảm không nên có trong cuộc
                    hôn nhân này. Mười tháng hoài thai sắp sinh, một tờ đơn ly hôn trên đất,
                    cô mới hoàn toàn tình ngộ. Sau này anh ta nói "Bà xã về đi, người
                    Một cuộc giao dịch, cô mang thai con của người lạ,
                    mang bụng bầu gả cho người đàn ông đã đính ước từ nhỏ. Vốn cho rằng chỉ 
                    là một cuộc giao dịch, lại dây dưa thứ tình cảm không nên có trong cuộc
                    hôn nhân này. Mười tháng hoài thai sắp sinh, một tờ đơn ly hôn trên đất,
                    cô mới hoàn toàn tình ngộ. Sau này anh ta nói "Bà xã về đi, người
                    </p>
            </div>

            <hr>
            <h4>Mục lục</h4>
            <ul class="chapter-list">
                <li class="chapter-item"><a href="">Phần thứ nhất - CHƯƠNG MỘT</a></li>
                <li class="chapter-item"><a href="">Phần thứ nhất - CHƯƠNG MỘT</a></li>
                <li class="chapter-item"><a href="">Phần thứ nhất - CHƯƠNG MỘT</a></li>
                <li class="chapter-item"><a href="">Phần thứ nhất - CHƯƠNG MỘT</a></li>
                <li class="chapter-item"><a href="">Phần thứ nhất - CHƯƠNG MỘT</a></li>
                <li class="chapter-item"><a href="">Phần thứ nhất - CHƯƠNG MỘT</a></li>
                <li class="chapter-item"><a href="">Phần thứ nhất - CHƯƠNG MỘT</a></li>
                <li class="chapter-item"><a href="">Phần thứ nhất - CHƯƠNG MỘT</a></li>
                <li class="chapter-item"><a href="">Phần thứ nhất - CHƯƠNG MỘT</a></li>
            </ul>
        </div>
    </li>
</ul>

<!-- End Content -->
<div class="cl">&nbsp;</div>
</div>

@endsection
