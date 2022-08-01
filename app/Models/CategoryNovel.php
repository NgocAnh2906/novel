<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryNovel extends Model
{
    use HasFactory;
    protected $fillable =[
        
        'name_cate_novel','slug_cate_novel','id_category', 'status'
    ];
    protected $primaryKey='id_cate_novel';
    protected $table= 'categorynovels';
      public $incrementing = false;

     
     public function truyen(){
        return $this->hasMany('App\Models\Novel','id_cate_novel','id_cate_novel');
    }

}
