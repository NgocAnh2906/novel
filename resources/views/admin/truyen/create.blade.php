@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h3>Thêm Truyện</h3></div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                   <form method="POST" action="{{route('truyen-tieu-thuyet.store')}}" enctype="multipart/form-data">
                            @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Mã truyện:</label>
                            <input type="text" class="form-control" value="{{old('id_novel')}}" name="id_novel" aria-describedby="emailHelp" placeholder="Mã truyện.....">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên truyện:</label>
                            <input type="text" class="form-control" value="{{old('name_novel')}}" onkeyup="ChangeToSlug();" name="name_novel" id="slug" aria-describedby="emailHelp" placeholder="Tên truyện.....">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug truyện:</label>
                            <input type="text" class="form-control" value="{{old('slug_novel')}}" name="slug_novel" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug truyện.....">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" >Hình ảnh:</label>
                            <input type="file" class="form-control"  name="image">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tác giả:</label>
                            <input type="text" class="form-control" value="{{old('author')}}" name="author" aria-describedby="emailHelp" placeholder="Tác giả.....">
                        </div>
                        
                        <div class="form-group">
                              <label for="exampleInputEmail1" class="form-label"> Thể loại:</label>
                            <select class="form-select" aria-label="Default select example" name="category">
                                @foreach ($theloai as $key =>$tl)
                                <option value="{{$tl->id_cate_novel}}">{{$tl->name_cate_novel}}</option>
                                 @endforeach
                             </select>
                        </div>
                         <div class="form-group">
                              <label for="exampleInputEmail1" class="form-label"> Danh mục :</label>
                            <select class="form-select" aria-label="Default select example" name="danhmuc">
                                @foreach ($danhmuc as $key =>$danh)
                                <option value="{{$danh->id_category}}">{{$danh->name_category}}</option>

                                 @endforeach
                             </select>
                        </div>
                       
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Lượt xem:</label>
                            <input type="text" class="form-control" value="{{old('view')}}" name="view" aria-describedby="emailHelp" placeholder="Lượt xem.....">
                        </div>
                         <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Mô tả truyện:</label>
                            <textarea name="description" id="noidung_truyen1" rows="4"class="form-control"   placeholder="Mô tả truyện.....">{{old('description')}}</textarea>
                        </div>
                        <div class="form-group">
                              <label for="exampleInputEmail1" class="form-label">Kích hoạt:</label>
                            <select class="form-select" aria-label="Default select example" name="status">
                                <option value="0">Kích hoạt</option>
                                 <option value="1">Không kích hoạt</option>
                             </select>
                        </div>
                       <br>
                      <button type="submit" class="btn btn-primary" name="themtruyen">Thêm</button>
                      <a href="{{ url('/truyen-tieu-thuyet') }}" class="btn btn-light">Tiếp Tục</a> 
                    </form>


                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


    


          