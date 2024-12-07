<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected  $fillable = ['title_ru','title_en','title_uz'];
}
