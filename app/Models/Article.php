<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];

    public function categorie_parente(){
        return $this->belongsTo(Menu::class,'id_menu');
    }

    public function auteur(){
        return $this->belongsTo(User::class,'id_auteur');
    }
}
