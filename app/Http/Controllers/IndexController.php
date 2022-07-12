<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryNovel;
use App\Models\Novel;


class IndexController extends Controller
{
    public function home()
    {
        $danhmuc= Category::orderBy('id_category','DESC')->get();
        $theloai= CategoryNovel::with('danhmuc')->get();
        $truyen= Novel::with('theloai')->get();
        return view ('pages.main')->with(compact('danhmuc','theloai','truyen'));
    }
    public function doctruyen()
    {
        //
    }
    public function doctruyentheloai()
    {
        //
    }
    public function doc()
    {
        return view('pages.novel');
    }

}
