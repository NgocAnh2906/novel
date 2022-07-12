<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    protected $fillable =[
        
        'id_novel','name_chapter', 'slug_chapter','', 'main_content'
    ];
    protected $primaryKey='id_cate_chapter';
    protected $table= 'caterories_chapter';
      public $incrementing = false;

     public function truyen(){
        return $this->belongsTo('App\Models\Novel','id_novel','id_novel');    
    }
}
