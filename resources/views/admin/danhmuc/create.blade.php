@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h3>Thêm danh mục truyện</h3></div>
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
                   <form method="POST" action="{{route('danhmuc.store')}}">
                            @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên danh mục:</label>
                            <input type="text" class="form-control" value="{{old('name_category')}}" onkeyup="ChangeToSlug();" name="name_category" id="slug" aria-describedby="emailHelp" placeholder="Tên danh mục.....">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug danh mục:</label>
                            <input type="text" class="form-control" value="{{old('slug_category')}}" name="slug_category" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug danh mục.....">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Mô tả  danh mục:</label>
                            <textarea name="content"   rows="4"class="form-control"   placeholder="Mô tả danh mục.....">{{old('content')}}</textarea>
                        </div>
                        <div class="form-group">
                              <label for="exampleInputEmail1" class="form-label">Kích hoạt:</label>
                            <select class="form-select" aria-label="Default select example" name="status">
                                <option value="0">Kích hoạt</option>
                                 <option value="1">Không kích hoạt</option>
                             </select>
                        </div>
                       <br>
                      <button type="submit" class="btn btn-primary" name="themdanhmuc">Thêm</button>
                      <a href="{{ url('/danhmuc') }}" class="btn btn-light">Tiếp Tục</a> 
                    </form>


                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


    


          