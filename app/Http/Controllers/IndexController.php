<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryNovel;
use App\Models\Novel;
use App\Models\Chapter;

class IndexController extends Controller
{
  public function home()
  {
    $danhmuc = Category::orderBy('id_category', 'DESC')->get();
    $theloai = CategoryNovel::orderBy('id_cate_novel', 'DESC')->get();

    $truyen = Novel::orderBy('id_novel', 'DESC')
      ->where('status', 0)
      ->get();

    // $truyen_random = Novel::orderBy('id_novel', 'DESC')
    //   ->where('status', 0)
    //   ->inRandomOrder()
    //   ->get();

    $truyen_pt = Novel::orderBy('id_novel', 'DESC')
      ->where('status', 0)
      ->paginate(8);

    return view('pages.main')->with(
      compact('danhmuc', 'theloai', 'truyen', 'truyen_pt')
    );
  }

  public function theloai($slug)
  {
    //menu->theloai
    $danhmuc = Category::orderBy('id_category', 'DESC')->get();

    $truyen = Novel::with('theloai')->get();

    $theloai = CategoryNovel::orderBy('id_cate_novel', 'DESC')->get();

    $theloai_id = CategoryNovel::where('slug_cate_novel', $slug)->first();
    $tentheloai = $theloai_id->name_cate_novel;

    $truyen_tl = Novel::orderBy('id_novel', 'DESC')
      ->where('status', 0)
      ->where('id_cate_novel', $theloai_id->id_cate_novel)
      ->paginate(8);

    return view('pages.category_novel')->with(
      compact('tentheloai', 'danhmuc', 'theloai', 'truyen', 'truyen_tl')
    );
  }
  public function danhmuc($slug)
  {
    //danhmuc cua the loai
    $danhmuc = Category::orderBy('id_category', 'DESC')->get();

    $theloai = CategoryNovel::orderBy('id_cate_novel', 'ASC')->get();

    $truyen = Novel::with('danhmuc')->get();

    $danhmuc_id = Category::with('truyen')
      ->where('slug_category', $slug)
      ->first();
    $tendanhmuc = $danhmuc_id->name_category;

    $truyen_dmuc = Novel::with('danhmuc')
      ->where('id_category', $danhmuc_id->id_category)
      ->paginate(8);

    return view('pages.danhmuc')->with(
      compact(
        'tendanhmuc',
        'danhmuc',
        'theloai',
        'truyen',
        'danhmuc_id',
        'truyen_dmuc'
      )
    );
  }
  public function doctruyen($slug)
  {
    //chi tiết truyện
    $danhmuc = Category::orderBy('id_category', 'DESC')->get();

    $theloai = CategoryNovel::orderBy('id_cate_novel', 'DESC')->get();

    $truyen = Novel::orderBy('id_novel', 'DESC')
      ->where('status', 0)
      ->get();

    $truyen2 = Novel::with('theloai')
      ->where('status', 0)
      ->where('slug_novel', $slug)
      ->first();

    $truyen_breadcrumd = Novel::with('danhmuc', 'theloai')
      ->where('id_novel', $truyen2->id_novel)
      ->first();

    $chaptertruyen = Novel::with('chapter')
      ->where('id_novel', $slug)
      ->first();

    $chapter_dau = Chapter::with('truyen')
      ->orderBy('id_cate_chapter', 'ASC')
      ->where('id_novel', $truyen2->id_novel)
      ->first();

    $chapter = Chapter::with('truyen')
      ->orderBy('id_cate_chapter', 'ASC')
      ->where('id_novel', $truyen2->id_novel)
      ->get();

    $cungtheloai = Novel::with('theloai')
      ->where('id_cate_novel', $truyen2->theloai->id_cate_novel)
      ->get();

    return view('pages.novel')->with(
      compact(
        'cungtheloai',
        'chapter',
        'chapter_dau',
        'chaptertruyen',
        'truyen_breadcrumd',
        'truyen2',
        'truyen',
        'theloai',
        'danhmuc'
      )
    );
  }
  public function doc($slug)
  {
    $danhmuc = Category::orderBy('id_category', 'DESC')->get();

    $theloai = CategoryNovel::orderBy('id_cate_novel', 'DESC')->get();

    $truyen = Novel::orderBy('id_novel', 'DESC')
      ->where('status', 0)
      ->get();

    $chapter_truyen = Chapter::with('truyen')
      ->where('slug_chapter', $slug)
      ->first();
    //phan chia
    $truyen_breadcrumd = Novel::with('danhmuc', 'theloai')
      ->where('id_novel', $chapter_truyen->id_novel)
      ->first();
    // end phan chia

    $truyen_chapter = Chapter::with('truyen')
      ->where('slug_chapter', $slug)
      ->where('id_novel', $chapter_truyen->id_novel)
      ->first();

    $chapter = Chapter::with('truyen')
      ->orderBy('id_cate_chapter', 'ASC')
      ->where('id_novel', $chapter_truyen->id_novel)
      ->get();

    $chapter_sau = Chapter::where('id_novel', $chapter_truyen->id_novel)
      ->where('id_cate_chapter', '>', $truyen_chapter->id_cate_chapter)
      ->min('slug_chapter');
    $max_id = Chapter::where('id_novel', $chapter_truyen->id_novel)
      ->orderBy('id_cate_chapter', 'DESC')
      ->first();
    $min_id = Chapter::where('id_novel', $chapter_truyen->id_novel)
      ->orderBy('id_cate_chapter', 'ASC')
      ->first();

    $chapter_truoc = Chapter::where('id_novel', $chapter_truyen->id_novel)
      ->where('id_cate_chapter', '<', $truyen_chapter->id_cate_chapter)
      ->max('slug_chapter');

    return view('pages.main_novel')->with(
      compact(
        'min_id',
        'max_id',
        'danhmuc',
        'theloai',
        'truyen',
        'chapter_truyen',
        'chapter_truoc',
        'chapter_sau',
        'truyen_chapter',
        'chapter',
        'truyen_breadcrumd'
      )
    );
  }
  public function search()
  {
    $danhmuc = Category::orderBy('id_category', 'DESC')->get();

    $theloai = CategoryNovel::orderBy('id_cate_novel', 'DESC')->get();

    $truyen = Novel::orderBy('id_novel', 'DESC')
      ->where('status', 0)
      ->get();

    $tukhoa = $_GET['tukhoa'];

    $truyen_timkiem = Novel::with('danhmuc', 'theloai')
      ->where('name_novel', 'LIKE', '%' . $tukhoa . '%')
      ->orWhere('author', 'LIKE', '%' . $tukhoa . '%')
      ->get();
    return view('pages.timkiem')->with(
      compact('danhmuc', 'theloai', 'truyen', 'tukhoa', 'truyen_timkiem')
    );
  }
}
