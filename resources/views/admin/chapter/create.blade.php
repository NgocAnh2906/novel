@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h3>Thêm chương</h3></div>
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
                   <form method="POST" action="{{route('chapter.store')}}">
                            @csrf
                        
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên chương :</label>
                            <input type="text" class="form-control" value="{{old('name_chapter')}}" onkeyup="ChangeToSlug();" name="name_chapter" id="slug" aria-describedby="emailHelp" placeholder="Tên chương.....">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug chương:</label>
                            <input type="text" class="form-control" value="{{old('slug_chapter')}}" name="slug_chapter" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug chapter.....">
                        </div>
            
                       
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nội dung chương :</label>
                            <textarea name="main_content" id="noidung_chapter1" rows="4"class="form-control"  placeholder="Mô tả chương.....">{{old('main_content')}}</textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1" class="form-label">Thuộc Truyện:</label>
                        <select class="form-select" aria-label="Default select example" name="novel">
                            @foreach ($truyen as $key =>$t)
                            <option value="{{$t->id_novel}}">{{$t->name_novel}}</option>
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
                      <button type="submit" class="btn btn-primary" name="themdanhmuc">Thêm</button>
                      <a href="{{ url('/chapter') }}" class="btn btn-light">Tiếp Tục</a> 
                    </form>


                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


    


          