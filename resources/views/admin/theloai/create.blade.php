@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h3>Thêm thể loại truyện</h3></div>
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
                   <form method="POST" action="{{route('theloai.store')}}">
                            @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Mã thể loại:</label>
                            <input type="text" class="form-control" value="{{old('id_cate_novel')}}" name="id_cate_novel" aria-describedby="emailHelp" placeholder="Mã thể loại.....">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên thể loại:</label>
                            <input type="text" class="form-control" value="{{old('name_cate_novel')}}" onkeyup="ChangeToSlug();" name="name_cate_novel" id="slug" aria-describedby="emailHelp" placeholder="Tên thể loại.....">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug thể loại:</label>
                            <input type="text" class="form-control" value="{{old('slug_cate_novel')}}" name="slug_cate_novel" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug thể loại.....">
                        </div>
                        <div class="form-group">
                              <label for="exampleInputEmail1" class="form-label"> Danh mục :</label>
                            <select class="form-select" aria-label="Default select example" name="category">
                                @foreach ($danhmuc as $key =>$danh)
                                <option value="{{$danh->id_category}}">{{$danh->name_category}}</option>

                                 @endforeach
                             </select>
                        </div>
                        <div class="form-group">
                              <label for="exampleInputEmail1" class="form-label">Kích hoạt:</label>
                            <select class="form-select" aria-label="Default select example" name="status">
                                <option value="0">Kích hoạt</option>
                                 <option value="1">Không kích hoạt</option>
                             </select>
                        </div>
                       <br>
                      <button type="submit" class="btn btn-primary" name="themtheloai">Thêm</button>
                      <a href="{{ url('/theloai') }}" class="btn btn-light">Tiếp Tục</a> 
                    </form>


                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


    


          