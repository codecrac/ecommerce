<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function articles(){
        return $this->hasMany(Article::class,'id_menu')->orderBy('id','desc');
    }

    public function enfants(){
        return $this->hasMany(Menu::class,'id_parent');
    }
    public function parent(){
        return $this->belongsTo(Menu::class,'id_parent');
    }
}
