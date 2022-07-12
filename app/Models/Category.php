<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

   
    protected $fillable =[
        'name_category','slug_category','content', 'status'
    ];
    protected $primaryKey='id_category';
    protected $table= 'categories';

    public function theloai(){
        return $this->hasMany('App\Models\CategoryNovel','id_category','id_category');
    }

}
