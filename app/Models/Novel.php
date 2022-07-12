<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novel extends Model
{
    use HasFactory;
    protected $fillable =[
        
    'name_novel','slug_novel','image','author', 'id_cate_novel' ,'view', 'description' ,'status'
    ];
    protected $primaryKey='id_novel';
    protected $table= 'novels';
      public $incrementing = false;

    public function theloai(){
        return $this->belongsTo('App\Models\CategoryNovel','id_cate_novel','id_cate_novel');    
    }
    public function chapter(){
        return $this->hasMany('App\Models\Chapter','id_novel','id_novel');
    }
    
}
