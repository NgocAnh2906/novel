<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CategoryNovel;

use App\Models\Novel;

use App\Models\Category;
use App\Models\Chapter;

class NovelController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $truyen = Novel::with('theloai', 'danhmuc', 'chapter')
      ->orderBy('id_novel', 'DESC')
      ->paginate(8);
    if ($key = request()->key) {
      $truyen = Novel::with('theloai', 'danhmuc')
        ->orderBy('id_novel', 'DESC')
        ->where('name_novel', 'LIKE', '%' . $key . '%')
        ->get();
    }
    return view('admin.truyen.index')->with(compact('truyen'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $theloai = CategoryNovel::orderBy('id_cate_novel', 'DESC')->get();
    $danhmuc = Category::orderBy('id_category', 'DESC')->get();

    return view('admin.truyen.create')->with(compact('theloai', 'danhmuc'));
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
        'id_novel' => 'required|unique:novels|max:255',
        'name_novel' => 'required|unique:novels|max:255',
        'slug_novel' => 'required|unique:novels|max:255',
        'image' =>
          'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100, max_width=1000,max_height=1000',

        'author' => 'required',
        'category' => 'required',
        'danhmuc' => 'required',
        'view' => 'required',
        'description' => 'required',
        'status' => 'required',
      ],
      [
        'id_novel.unique' => 'Mã thể loại đã được sử dụng',
        'id_novel.required' => 'Tác giả không được để trống',
        'id_novel.max' => 'Mô tả không được quá 255 kí tự',

        'name_novel.unique' => 'Tên thể loại đã được sử dụng',
        'name_novel.required' => 'Tác giả không được để trống',
        'name_novel.max' => 'Mô tả không được quá 255 kí tự',

        'slug_novel.unique' => 'Slug thể loại đã được sử dụng',
        'slug_novel.required' => 'Tác giả không được để trống',
        'slug_novel.max' => 'Mô tả không được quá 255 kí tự',

        'image.required' => 'Hình ảnh không được để trống',
        'image.mimes' => 'Hình ảnh phải là loại tệp: jpg, png, jpeg, gif, svg',
        'image.max' => 'Hình ảnh tối đa 2048MB',
        'image.dimensions' => 'Hình ảnh có kích thước hình ảnh không hợp lệ.',

        'author.required' => 'Tác giả không được để trống',
        'category.required' => 'Thể loại không được để trống',
        'danhmuc' => 'Danh mục không được để trống',
        'number_chapter.required' => 'Số chương không được để trống',
        'view.required' => 'Lượt xem không được để trống',
        'description.required' => 'Mô tả không được để trống',
        'status.required' => 'Status không được để trống',
      ]
    );
    /* $data= $request->all();
     dd($data);*/
    $truyen = new Novel();
    $truyen->id_novel = $data['id_novel'];
    $truyen->name_novel = $data['name_novel'];
    $truyen->slug_novel = $data['slug_novel'];
    //them anh vao forder
    $get_image = $request->image;
    $path = 'uploads/truyen/';
    $get_name_image = $get_image->getClientOriginalName();
    $name_image = current(explode('.', $get_name_image));
    $new_image =
      $name_image .
      rand(0, 99) .
      '.' .
      $get_image->getClientOriginalExtension();
    $get_image->move($path, $new_image);

    $truyen->image = $new_image;

    $truyen->author = $data['author'];

    $truyen->id_cate_novel = $data['category'];
    $truyen->id_category = $data['danhmuc'];

    $truyen->view = $data['view'];
    $truyen->description = $data['description'];
    $truyen->status = $data['status'];

    $truyen->save();

    return redirect()
      ->back()
      ->with('success', 'Thêm truyện thành công');
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
    $truyen = Novel::find($id);

    $theloai = CategoryNovel::orderBy('id_cate_novel', 'DESC')->get();
    $danhmuc = Category::orderBy('id_category', 'DESC')->get();

    /*      dd($theloai,$danhmuc);*/
    return view('admin.truyen.edit')->with(
      compact('truyen', 'theloai', 'danhmuc')
    );
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
        'id_novel' => 'required|max:255',
        'name_novel' => 'required|max:255',
        'slug_novel' => 'required|max:255',

        /*'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|demensions:min_width=100,min_height=100,max_width=1000,max_height=1000',*/
        'author' => 'required',
        'category' => 'required',
        'danhmuc' => 'required',
        'view' => 'required',
        'description' => 'required',
        'status' => 'required',
      ],
      [
        'id_novel.required' => 'Tác giả không được để trống',
        'id_novel.max' => 'Mô tả không được quá 255 kí tự',

        'name_novel.required' => 'Tác giả không được để trống',
        'name_novel.max' => 'Mô tả không được quá 255 kí tự',

        'slug_novel.required' => 'Tác giả không được để trống',
        'slug_novel.max' => 'Mô tả không được quá 255 kí tự',

        'author.required' => 'Tác giả không được để trống',
        'category.required' => 'Thể loại không được để trống',
        'danhmuc' => 'Danh mục không được để trống',

        'view.required' => 'Lượt xem không được để trống',
        'description.required' => 'Mô tả không được để trống',
        'status.required' => 'Status không được để trống',
      ]
    );
    /* $data= $request->all();
     dd($data);*/
    $truyen = Novel::find($id);
    $truyen->id_novel = $data['id_novel'];
    $truyen->name_novel = $data['name_novel'];
    $truyen->slug_novel = $data['slug_novel'];
    //them anh vao forder
    $get_image = $request->image;
    if ($get_image) {
      $path = 'uploads/truyen/' . $truyen->image;
      if (file_exists($path)) {
        unlink($path);
      }
      $path = 'uploads/truyen/';
      $get_name_image = $get_image->getClientOriginalName();
      $name_image = current(explode('.', $get_name_image));
      $new_image =
        $name_image .
        rand(0, 99) .
        '.' .
        $get_image->getClientOriginalExtension();
      $get_image->move($path, $new_image);
      $truyen->image = $new_image;
    }
    $truyen->author = $data['author'];
    $truyen->id_cate_novel = $data['category'];
    $truyen->id_category = $data['danhmuc'];
    $truyen->view = $data['view'];
    $truyen->description = $data['description'];
    $truyen->status = $data['status'];
    $truyen->save();

    return redirect()
      ->back()
      ->with('success', 'Cập nhật truyện thành công');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $truyen = Novel::find($id);
    $path = 'uploads/truyen/' . $truyen->image;
    if (file_exists($path)) {
      unlink($path);
    }
    Novel::find($id)->delete();
    return redirect()
      ->back()
      ->with('success', 'Xóa truyện thành công');
  }
}
