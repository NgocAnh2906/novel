<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Novel;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $danhmuc = Category::orderBy('id_category', 'DESC')->paginate(8);
    $dem = Category::with('truyen')
      ->select("id_category", "name_category")
      ->withCount('id_novel')
      ->get()
      ->toArray();
    dd($dem);
    if ($key = request()->key) {
      $danhmuc = Category::orderBy('id_category', 'DESC')
        ->where('name_category', 'LIKE', '%' . $key . '%')
        ->get();
    }
    return view('admin.danhmuc.index')->with(compact('danhmuc'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.danhmuc.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $data = $request->validate(
      [
        'name_category' => 'required|unique:categories|max:255',
        'slug_category' => 'required|unique:categories|max:255',
        'content' => 'max:255',
        'status' => 'required',
      ],
      [
        'name_category.unique' => 'Tên danh mục đã được sử dụng',
        'slug_category.unique' => 'Slug danh mục đã được sử dụng',
        'name_category.required' => 'Tên danh mục không được để trống',
        'slug_category.required' => 'Slug danh mục không được để trống',
        'content.max' => 'Mô tả không được quá 255 kí tự',
      ]
    );
    /*$data= $request->all();
     dd($data);*/
    $danhmuc = new Category();
    $danhmuc->name_category = $data['name_category'];
    $danhmuc->slug_category = $data['slug_category'];
    $danhmuc->content = $data['content'];
    $danhmuc->status = $data['status'];

    $danhmuc->save();

    return redirect()
      ->back()
      ->with('success', 'Thêm danh mục thành công');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $danhmuc = Category::find($id);
    return view('admin.danhmuc.edit')->with(compact('danhmuc'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $data = $request->validate(
      [
        'name_category' => 'required|max:255',
        'slug_category' => 'required|max:255',
        'content' => 'max:255',
        'status' => 'required',
      ],
      [
        'name_category.required' => 'Tên danh mục không được để trống',
        'slug_category.required' => 'Slug danh mục không được để trống',
        'content.max' => 'Mô tả không được quá 255 kí tự',
      ]
    );
    /*$data= $request->all();
     dd($data);*/
    $danhmuc = Category::find($id);
    $danhmuc->name_category = $data['name_category'];
    $danhmuc->slug_category = $data['slug_category'];
    $danhmuc->content = $data['content'];
    $danhmuc->status = $data['status'];

    $danhmuc->save();

    return redirect()
      ->back()
      ->with('success', 'Cập nhật danh mục thành công');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $a = Novel::where('id_category', $id)->count();

    if ($a == 0) {
      Category::find($id)->delete();
      return redirect()
        ->back()
        ->with('success', 'Xóa danh mục thành công');
    } else {
      echo "<script type='text/javascript'>
              alert (' Không thể xóa! Danh mục có chứ truyện ');
              window.location='";

      echo "'

        </script>";
    }
  }
}
