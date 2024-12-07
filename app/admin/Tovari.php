<?php
/**
 * Created by PhpStorm.
 * User: Мастер Класс
 * Date: 18.11.2023
 * Time: 18:02
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tovari extends Model{

    protected $fillable = ['title_ru','title_en','title_uz','price'];

}