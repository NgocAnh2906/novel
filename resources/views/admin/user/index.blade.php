@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <td class="navbar-brand">Liệt kê User</td>
                    <td >
                        <a type="button" href="{{ url('/theloai/create') }}"class="btn btn-outline-info">
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
                          <th scope="col">Tên User </th>
                        
                        </tr>
                      </thead>
                      <tbody >
                     
                        <tr class="hover">
                          <th scope="col">{</th>
                         
                      </tbody>
                    </table>


                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection