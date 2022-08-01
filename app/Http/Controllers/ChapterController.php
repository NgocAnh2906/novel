<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Chapter;

use App\Models\Novel;
class ChapterController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $chapter = Chapter::with('truyen')
      ->orderBy('id_novel', 'DESC')
      ->paginate(8);
    /*  dd($theloai);*/

    if ($key = request()->key) {
      $chapter = Chapter::with('truyen')
        ->where('name_chapter', 'LIKE', '%' . $key . '%')
        ->get();
    }
    return view('admin.chapter.index')->with(compact('chapter'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $truyen = Novel::orderBy('id_novel', 'DESC')->get();
    return view('admin.chapter.create')->with(compact('truyen'));
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
        'name_chapter' => 'required|unique:caterories_chapter|max:255',
        'slug_chapter' => 'required|unique:caterories_chapter|max:255',

        'main_content' => 'required',

        'novel' => 'required',
        'status' => 'required',
      ],
      [
        'name_chapter.unique' => 'Tên chương đã được sử dụng',
        'name_chapter.required' => 'Tên chương không được để trống',
        'name_chapter.max' => 'Tên chương không được để trống',

        'slug_chapter.unique' => 'Slug chương đã được sử dụng',
        'slug_chapter.required' => 'Slug chương không được để trống',
        'slug_chapter.max' => 'Slug chương không được để trống',

        'main_content.required' => 'Nội dung chương không được để trống',
        'novel.required' => 'Truyện không được để trống',
        'status.required' => 'Trạng thái không được để trống',
      ]
    );
    /*  $data= $request->all();
     dd($data);*/
    $chapter = new Chapter();
    $chapter->name_chapter = $data['name_chapter'];
    $chapter->slug_chapter = $data['slug_chapter'];
    $chapter->main_content = $data['main_content'];
    $chapter->id_novel = $data['novel'];
    $chapter->status = $data['status'];

    $chapter->save();

    return redirect()
      ->back()
      ->with('success', 'Thêm chương thành công');
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
    $chapter = Chapter::find($id);

    $truyen = Novel::orderBy('id_novel', 'DESC')->get();
    /*      dd($theloai,$danhmuc);*/
    return view('admin.chapter.edit')->with(compact('chapter', 'truyen'));
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
        'name_chapter' => 'required|max:255',
        'slug_chapter' => 'required|max:255',

        'main_content' => 'required',
        'novel' => 'required',
        'status' => 'required',
      ],
      [
        'name_chapter.required' => 'Tên chương không được để trống',
        'name_chapter.max' => 'Tên chương không được để trống',
        'slug_chapter.required' => 'Slug chương không được để trống',
        'slug_chapter.max' => 'Slug chương không được để trống',
        'main_content.required' => 'Nội dung chương không được để trống',
        'novel.required' => 'Truyện không được để trống',
        'status.required' => 'Trạng thái không được để trống',
      ]
    );
    //$data= $request->all();
    //dd($data);
    $chapter = Chapter::find($id);
    $chapter->name_chapter = $data['name_chapter'];
    $chapter->slug_chapter = $data['slug_chapter'];
    $chapter->main_content = $data['main_content'];
    $chapter->id_novel = $data['novel'];
    $chapter->status = $data['status'];

    $chapter->save();

    return redirect()
      ->back()
      ->with('success', 'Cập nhật chương thành công');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Chapter::find($id)->delete();
    return redirect()
      ->back()
      ->with('success', 'Xóa chương thành công');
  }
}
