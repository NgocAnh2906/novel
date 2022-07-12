@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <td class="navbar-brand" >Liệt kê chương truyện</td>
                    <td >
                        <a type="button" href="{{ url('/chapter/create') }}"class="btn btn-outline-info">
                            <i class="fa-solid fa-circle-plus">Thêm mới</i>
                        </a>                   
                    </td>
                    
                </div>
                <div>
                    
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                   <table class="table table-hover">
                      <thead>
                        <tr class="card-header" >
                          <th scope="col">STT</th>
                          <th scope="col">Tên chương</th>
                          <th scope="col">Slug chương</th>
           
                           <th scope="col">Truyện</th>
                    
                          <th scope="col">Kích hoạt</th>
                          <th scope="col">Hành động</th>
                        </tr>
                      </thead>
                      <tbody >
                        @foreach ($chapter as $key=>$chap)
                        <tr class="hover">
                          <th scope="col">{{$key+1}}</th>
                          <td>{{$chap->name_chapter}}</td>
                          <td>{{$chap->slug_chapter}}</td>
                                              
                          <td>{{$chap->truyen->name_novel}}</td>
         
                          <td>
                              @if($chap->status==0)
                                <span class="text text-success">Kích hoạt</span>
                              @else
                              <span class="text text-danger">Không kích hoạt</span>
                              @endif
                          </td>
                        <td >
                            <a href="{{route('chapter.edit',[$chap->id_cate_chapter])}}" class="btn btn-outline-info">
                                
                                <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" width="16" height="16">    <path d="M 19.171875 2 C 18.448125 2 17.724375 2.275625 17.171875 2.828125 L 16 4 L 20 8 L 21.171875 6.828125 C 22.275875 5.724125 22.275875 3.933125 21.171875 2.828125 C 20.619375 2.275625 19.895625 2 19.171875 2 z M 14.5 5.5 L 3 17 L 3 21 L 7 21 L 18.5 9.5 L 14.5 5.5 z"/></svg>
                            </a> 
                            <form action="{{route('chapter.destroy',$chap->id_cate_chapter)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button  class="btn btn-outline-danger" onclick="return confirm('Bạn chắc chắn muốn xóa chứ?')" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </button>
                               
                            </form>
                        </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>


                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection