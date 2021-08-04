<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatistiqueAchat extends Model
{
    public $table = 'statistique_achat';
    public $timestamps = false;
    public $guarded = [];

    public function article(){
        return $this->belongsTo(Article::class,'id_article');
    }

}
