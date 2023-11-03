<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable = ['CATEGORIA_NOME',  'CATEGORIA_DESC'];
    protected $table = "CATEGORIA";
    protected $primaryKey = "CATEGORIA_ID";
    public $timestamps = false;
}
