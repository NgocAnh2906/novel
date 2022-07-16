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
        $danhmuc= Category::orderBy('id_category','DESC')->get();
        $theloai= CategoryNovel::with('danhmuc')->get();
        $truyen= Novel::orderBy('id_novel','DESC')->where('status',0)->get();

        return view ('pages.main')->with(compact('danhmuc','theloai','truyen'));
    }
    public function doctruyen($slug) //chi tiết truyện
    {
        $danhmuc= Category::orderBy('id_category','DESC')->get();
        
        $theloai= CategoryNovel::orderBy('id_cate_novel','DESC')->get();

        $truyen= Novel::orderBy('id_novel','DESC')->where('status',0)->get();

        $truyen2= Novel::with('theloai')->where('id_novel',$slug)->first();
        
        $chapter= Chapter::with('truyen')->orderBy('id_cate_chapter','DESC')->where('id_novel',$truyen2->id_novel)->get();

        $cungtheloai= Novel::with('theloai')->where('id_cate_novel',$truyen2->theloai->id_cate_novel)->get();
         return view ('pages.novel')->with(compact('danhmuc','theloai','truyen', 'truyen2', 'chapter','cungtheloai'));
    }
    public function danhmuc($slug)
    {
       $danhmuc= Category::orderBy('id_category','DESC')->get();
        $theloai= CategoryNovel::with('danhmuc')->get();
        $truyen= Novel::with('theloai')->get();
         return view ('pages.novel')->with(compact('danhmuc','theloai','truyen'));
    }
    public function theloai($slug)  //menu->theloai
    {
        $danhmuc= Category::orderBy('id_category','DESC')->get();

        $theloai= CategoryNovel::with('danhmuc')->get();

        $theloai_id= CategoryNovel::where('slug_cate_novel',$slug)->first();

        $truyen= Novel::orderBy('id_novel','DESC')->where('status',0)->where('id_cate_novel',$theloai_id->id_cate_novel)->get();
         return view ('pages.category_novel')->with(compact('danhmuc','theloai','truyen'));
    }
    public function doc()
    {
        return view('pages.novel');
    }

}
