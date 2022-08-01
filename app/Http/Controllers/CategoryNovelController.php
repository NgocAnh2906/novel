<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CategoryNovel;

class CategoryNovelController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $theloai = CategoryNovel::orderBy('id_cate_novel', 'DESC')->paginate(8);
    /*  dd($theloai);*/
    if ($key = request()->key) {
      $theloai = CategoryNovel::orderBy('id_cate_novel', 'DESC')
        ->where('name_cate_novel', 'LIKE', '%' . $key . '%')
        ->get();
    }
    return view('admin.theloai.index')->with(compact('theloai'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.theloai.create');
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
        'id_cate_novel' => 'required|unique:categorynovels|max:255',
        'name_cate_novel' => 'required|unique:categorynovels|max:255',
        'slug_cate_novel' => 'required|unique:categorynovels|max:255',
        'status' => 'required',
      ],
      [
        'id_cate_novel.unique' => 'Mã thể loại đã được sử dụng',
        'name_cate_novel.unique' => 'Tên thể loại đã được sử dụng',
        'slug_cate_novel.unique' => 'Slug thể loại đã được sử dụng',
        'id_cate_novel.required' => 'Mã thể loại không được để trống',
        'name_cate_novel.required' => 'Tên thể loại không được để trống',
        'slug_cate_novel.required' => 'Slug thể loại không được để trống',
      ]
    );
    /* $data= $request->all();
     dd($data);*/
    $theloai = new CategoryNovel();
    $theloai->id_cate_novel = $data['id_cate_novel'];
    $theloai->name_cate_novel = $data['name_cate_novel'];
    $theloai->slug_cate_novel = $data['slug_cate_novel'];
    $theloai->status = $data['status'];

    $theloai->save();

    return redirect()
      ->back()
      ->with('success', 'Thêm thể loại thành công');
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
    $theloai = CategoryNovel::find($id);

    /*      dd($theloai,$danhmuc);*/
    return view('admin.theloai.edit')->with(compact('theloai'));
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
        'id_cate_novel' => 'required|max:255',
        'name_cate_novel' => 'required|max:255',
        'slug_cate_novel' => 'required|max:255',
        'status' => 'required',
      ],
      [
        'id_cate_novel.required' => 'Mã thể loại không được để trống',
        'name_cate_novel.required' => 'Tên thể loại không được để trống',
        'slug_cate_novel.required' => 'Slug thể loại không được để trống',
      ]
    );
    /* $data= $request->all();
     dd($data);*/
    $theloai = CategoryNovel::find($id);
    $theloai->id_cate_novel = $data['id_cate_novel'];
    $theloai->name_cate_novel = $data['name_cate_novel'];
    $theloai->slug_cate_novel = $data['slug_cate_novel'];
    $theloai->status = $data['status'];

    $theloai->save();

    return redirect()
      ->back()
      ->with('success', 'Cập nhật thể loại thành công');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    CategoryNovel::find($id)->delete();
    return redirect()
      ->back()
      ->with('success', 'Xóa thể loại thành công');
  }
}
